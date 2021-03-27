'use strict';

jQuery(function($) {

	var $window = $(window),
		$body = $('body'),
		screenWidth = $window.width(),
		screenHeight = $window.height(),
		scrollBarWidth = 0;

	$window.on('resize orientationchange', function() {
		screenWidth = $window.width();
		screenHeight = $window.height();
	});

	$window.on('load', function() {
		$window.resize();
	});

	$(function () { objectFitImages() }); // Object Fit PolyFill for IE and Safari

	window.fly = {
		init : function() {
			this.resizedEvent(400); // Trigger Event after Window is Resized
			this.disableEmptyLinks(); // Disable Empty Links
			this.toolTips(); // ToolTips Init
			this.placeHolders(); // PlaceHolders Init
			this.checkBoxes(); // Styled CheckBoxes, RadioButtons
			this.selects(); // Styled Selects
			this.scrollToAnchors(); // Smooth Scroll to Anchors
			this.scrollBarWidthDetection(); // ScrollBar Width Detection
			this.videoPlayerRatio(); // Video Player Ratio
			this.fullHeight(); // Set full window height to the Blocks
			this.ieNoFlex(); // Disable Flex Model for IE11, so Buggy

			this.inputMaskInit(); // Phone Number Mask
			this.paymentMethod(); // Payment Form
			this.pageLoader(true, 15000); // Page Loader (isActive, maxLoadTime)
			this.waveInit(); // Wave Effect
			this.flipInit(); // Flip Effect
			this.dropDownMenu(); // Dropdown Menu in Header
			//this.stickyMenuInit(); // Sticky Menu
			//this.stickySideBar(); // Sticky SideBar
			this.smoothPageScroll(false); // Smooth Page Scrolling (isActive)
			this.mainSlider(); // Bootstrap Slider
			this.flySliderInit(); // Fly Slider
			this.lastItemLabel('.post-meta'); // Post Meta Last Item
			//this.parallaxInit(); // Parallax
			this.lightBox(); // LightBox (swipeBox)
			this.owlSlidersInit(); // Owl Carousels
			this.statsCounter(false); // Statistics Digits, set to false to count only once
			this.progressCalc(); // Project Progress Calculation
			this.headerVideo(); // Video in Header
			this.thumbnailSlider(); // Thumbnail Slider in Portfolio Details

			this.additionalInit(); // Additional JS
		},

		resizedEvent : function(delay) {
			var resizeTimerId;

			$window.on('resize orientationchange', function() {
				clearTimeout(resizeTimerId);

				resizeTimerId = setTimeout( function() {
					$window.trigger('resized');
				}, delay);
			});
		},

		disableEmptyLinks : function() {
			$('[href="#"], .btn.disabled').on('click', function(event) {
				event.preventDefault();
			});
		},

		toolTips : function() {
			$('[data-toggle="tooltip"]').tooltip();
		},

		placeHolders : function() {
			if ($('[placeholder]').length) {
				$.Placeholder.init();
			}
		},

		checkBoxes : function() {
			$.fn.customInput = function() {
				$(this).each(function () {
					var container = $(this),
						input = container.find('input'),
						label = container.find('label');

					input.on('update', function() {
						input.is(':checked') ? label.addClass('checked') : label.removeClass('checked');
					})
						.trigger('update')
						.on('click', function() {
							$('input[name=' + input.attr('name') + ']').trigger('update');
						});
				});
			};

			$('.checkbox, .radio').customInput();
		},

		selects : function() {
			$('.select2').select2({
				minimumResultsForSearch: Infinity
			});
		},

		scrollToAnchors : function() {
			$('.anchor[href^="#"]').on('click', function(e) {
				e.preventDefault();
				var speed = 1,
					boost = 1,
					offset = 110,
					target = $(this).attr('href'),
					currPos = parseInt($window.scrollTop(), 10),
					targetPos = target!="#" && $(target).length==1 ? parseInt($(target).offset().top, 10) - offset : currPos,
					distance = targetPos - currPos;

				boost = Math.abs(distance * boost / 1000);

				$("html, body").animate({scrollTop: targetPos}, parseInt(Math.abs(distance / (speed + boost)), 10));
			});

			$window.on('pageLoaded', function() {
				var anchor = $('#' + window.location.href.split('#')[1]);

				if (anchor.length) {
					var anchorPos = parseInt(anchor.offset().top, 10);

					$("html, body").animate({scrollTop: anchorPos - 40}, anchorPos / 4);
				}
			});
		},

		scrollBarWidthDetection : function() {
			$body.append('<div class="scrollbar-detect"><span></span></div>');

			var scrollBarDetect = $('.scrollbar-detect');

			scrollBarWidth = scrollBarDetect.width() - scrollBarDetect.find('span').width();

			scrollBarDetect.remove();
		},

		videoPlayerRatio : function() {
			function setRatio() {
				$('.video-player').each(function() {
					var self = $(this),
						ratio = self.attr('width') && self.attr('height') ? self.attr('width') / self.attr('height') : 16/9,
						videoWidth = self.width();

					self.css({height: parseInt(videoWidth / ratio)});

					self.trigger('videoPlayerRatioSet');
				});
			}

			setRatio();

			$window.on('resized', function() {
				setRatio();
			});
		},

		fullHeight : function() {
			var blocks = $('.full-height');

			$window.on('resized', function() {
				blocks.css({
					height: screenHeight
				});
			});
		},

		ieNoFlex : function() {
			var isIE11 = /Trident.*rv[ :]*11\./.test(navigator.userAgent);

			if (isIE11) $('html').removeClass('flexbox').addClass('no-flexbox');
		},

		inputMaskInit : function() {
			$('[data-inputmask]').each(function() {
				$(this).inputmask();
			});
		},

		paymentMethod : function() {
			$('.payment-method').find('li').on('click', function() {
				var self = $(this);

				self.addClass('active');
				self.siblings().removeClass('active');
				self.find('input').prop('checked', true);
			});
		},

		pageLoader : function(isActive, maxLoadTime) {
			var loader = $('.page-loader'),
				maxLoadTime = maxLoadTime ? maxLoadTime : 10000; // Show Page Anyway after this Time

			function hideLoader() {
				var flySlider = $('.fly-slider'),
					videoBackground = $('.video-container'),
					hideLoaderDelay = 0;

				if (flySlider.length) {
					hideLoaderDelay = flySlider.data('rotation-duration') ? flySlider.data('rotation-duration') : 1000;
				}

				if (videoBackground.length) {
					hideLoaderDelay = 2000;
				}

				setTimeout(function() {
					loader.css({
						right: -scrollBarWidth
					});

					$('html').removeClass('page-loader-overflow-hidden');

					loader.addClass('inactive');

					if (Modernizr.csstransitions) {
						loader.one('webkitTransitionEnd mozTransitionEnd MSTransitionEnd otransitionend transitionend', function() {
							$window.trigger('pageLoaded');

							loader.off('webkitTransitionEnd mozTransitionEnd MSTransitionEnd otransitionend transitionend');
						});
					} else {
						$window.trigger('pageLoaded');
					}
				}, hideLoaderDelay);
			}

			if (isActive) {
				$window.on('load', hideLoader);
				setTimeout(hideLoader, maxLoadTime);
			} else {
				loader.remove();
				$('html').removeClass('page-loader-overflow-hidden');

				setTimeout(function() {
					$window.trigger('pageLoaded');
				}, 0);
			}

			$window.on('beforeunload', function() {
				$body.addClass('body-hide');
			});
		},

		waveInit : function() {
			Waves.attach('.js-wave', ['']);
			Waves.attach('.nav-menu a', ['']);
			Waves.attach('.pagination a', ['']);
			Waves.attach('.widget_categories a', ['']);
			Waves.attach('.tagcloud a', ['']);
			Waves.init();
		},

		flipInit : function() {
			$('.fly-flip-effect').each(function() {
				var self = $(this),
					button = self.find('.flip-button'),
					frontSide = self.find('.flip-front');

				button.on('click', function() {
					self.addClass('flip-hover');
				});

				self.hover(
					function() {},
					function() {
						self.removeClass('flip-hover');
					}
				);
			});
		},

		dropDownMenu : function() {
			var navContainer = $('.nav-menu'),
				navItems = navContainer.find('li'),
				animationIn = 'growIn',
				animationOut = 'growOut',
				breakPoint = 991;

			$window.on('load', function() {
				navContainer.removeClass('invisible');
			});

			navContainer.find('ul').addClass('hidden');
			navItems.has('ul').addClass('parent');
			navItems.children('a').addClass('menu-link');

			navItems.hover(function() {
				if (screenWidth > breakPoint) {
					var self = $(this),
						dropdown = self.children('ul');

					if(dropdown.length) {
						dropdown.removeClass('hidden');

						// Move Dropdown (Level 2+) to the left side of its Parent if it doesn't fit to screen
						var dropdownWidth = dropdown.outerWidth(),
							dropdownOffset = parseInt(dropdown.offset().left, 10);

						if (dropdownWidth + dropdownOffset > screenWidth - 5) {
							dropdown.addClass('left');
						}
						/////////////////////////////////////////////////////////////////

						if (Modernizr.cssanimations) {
							dropdown.addClass(animationIn + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
								dropdown.removeClass(animationIn + ' animated hidden');
								dropdown.off('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
							});
						}
					}
				}
			}, function() {
				if (screenWidth > breakPoint) {
					var self = $(this),
						dropdown = self.children('ul');

					if (Modernizr.cssanimations) {
						dropdown.removeClass(animationIn + ' animated hidden').addClass(animationOut + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
							dropdown.removeClass(animationOut + ' animated').addClass('hidden');
							dropdown.off('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
						});
					} else {
						dropdown.addClass('hidden');
					}
				}
			});

			// Dropdown Menu for Mobiles
			var menuButton = $('.hamburger').find('a'),
				isAnimating = false;

			menuButton.on('click', function() {
				if (isAnimating) return;

				isAnimating = true;

				if (navContainer.hasClass('active')) {
					menuButton.parent().removeClass('active');
					navContainer.removeClass('active');
					$body.removeClass('overflow-hidden');

					if (Modernizr.csstransitions && screenWidth < breakPoint + 1) {
						navContainer.one('webkitTransitionEnd mozTransitionEnd MSTransitionEnd otransitionend transitionend', function() {
							isAnimating = false;
							navContainer.off('webkitTransitionEnd mozTransitionEnd MSTransitionEnd otransitionend transitionend');

							navContainer.css({
								height: 'auto'
							});
						});
					} else {
						isAnimating = false;

						navContainer.css({
							height: 'auto'
						});
					}

				} else {
					menuButton.parent().addClass('active');
					navContainer.addClass('active');
					$body.addClass('overflow-hidden');

					navContainer.css({
						height: screenHeight - navContainer.parent().outerHeight()
					});

					$window.on('resized', function() {
						navContainer.css({
							height: screenHeight - navContainer.parent().outerHeight()
						});
					});

					if (Modernizr.csstransitions && screenWidth < breakPoint + 1) {
						navContainer.one('webkitTransitionEnd mozTransitionEnd MSTransitionEnd otransitionend transitionend', function() {
							isAnimating = false;
							navContainer.off('webkitTransitionEnd mozTransitionEnd MSTransitionEnd otransitionend transitionend');
						});
					} else {
						isAnimating = false;
					}
				}
			});

			navContainer.find('a.menu-link').on('click', function() {
				if (screenWidth < breakPoint + 1) {
					var self = $(this),
						menuItem = self.parent('li'),
						dropdown = self.siblings('ul');

					if (menuItem.hasClass('active')) {
						dropdown.addClass('hidden');
						menuItem.removeClass('active');
					} else {
						dropdown.removeClass('hidden');
						menuItem.addClass('active');
					}
				}
			});

			$window.on('resized', function() {
				if (screenWidth > breakPoint) {
					navItems.removeClass('active');
					navItems.find('ul').addClass('hidden');
					$body.removeClass('overflow-hidden');

					setTimeout(function() {
						navContainer.css({
							height: 'auto'
						});
					}, 0);
				}
			});
		},

		stickyMenuInit : function() {
			$.fn.stickyMenu = function() {
				var stickyMenu = $(this),
					stickyHeight = stickyMenu.outerHeight(true),
					becomeSticky = stickyMenu.data('become-sticky'),
					stickyOffset = 0,
					scrollTop = $window.scrollTop(),
					placeholder = $('<div/>'),
					isPlaceholder = stickyMenu.is('[data-no-placeholder]') ? false : true,
					prevScrollPosition = 0,
					currentScrollPosition = 0;

				if (!stickyMenu.hasClass('sticky')) stickyOffset = stickyMenu.offset().top;

				$window.on('load', function () {
					stickyHeight = stickyMenu.outerHeight(true);
				});

				function runStickyMenu() {
					scrollTop = $window.scrollTop();
					stickyHeight = stickyMenu.outerHeight(true);

					if(isPlaceholder) {
						placeholder.css({
							height: stickyHeight
						});
					}

					if (scrollTop > stickyHeight + stickyOffset) {
						stickyMenu.css({
							top: -stickyHeight - 1
						});

						setTimeout(function() {
							stickyMenu.addClass('sticky');
							if(isPlaceholder) placeholder.insertAfter(stickyMenu);
						}, 0);
					} else {
						stickyMenu.css({
							top: 0
						});

						setTimeout(function() {
							stickyMenu.removeClass('sticky');
							if(isPlaceholder) placeholder.detach();
						}, 0);
					}

					if (scrollTop > stickyHeight + stickyOffset + becomeSticky) {
						currentScrollPosition = scrollTop;

						if (currentScrollPosition >= prevScrollPosition) {
							stickyMenu.css({
								top: -stickyHeight - 1
							});
						} else if (currentScrollPosition < prevScrollPosition) {
							if($body.hasClass('admin-bar') && screenWidth > 782) {
								stickyMenu.css({top: 32});
							} else if ($body.hasClass('admin-bar') && screenWidth <= 782) {
								stickyMenu.css({top: 46});
							} else {
								stickyMenu.css({top: 0});
							}
						}

						prevScrollPosition = currentScrollPosition;
					} else {
						prevScrollPosition = 0;
					}
				}

				$window.on('load', function () {
					runStickyMenu();
				});

				$window.on('scroll', function () {
					runStickyMenu();
				});

				$window.on('resized', function () {
					runStickyMenu();
				});
			};

			$('[data-become-sticky]').each(function() {
				$(this).stickyMenu();
			});
		},

		stickySideBar : function() {
			$window.on('pageLoaded', function() {
				$('.sidebar-sticky').each(function() {
					var sidebar = $(this),
						stickyMenu = $('[data-become-sticky]'),
						sidebarOffset = stickyMenu.length ? stickyMenu.outerHeight() + 20 : 20;

					if($window.width() > 767 - scrollBarWidth) {
						sidebar.stick_in_parent({offset_top: sidebarOffset});
					}

					$window.on('resized', function() {
						if($window.width() > 767 - scrollBarWidth) {
							sidebarOffset = stickyMenu.length ? stickyMenu.outerHeight() + 20 : 20;

							sidebar.stick_in_parent({offset_top: sidebarOffset});
						} else {
							sidebar.trigger('sticky_kit:detach');
						}
					});
				});
			});
		},

		smoothPageScroll : function(isActive) {
			var scrollTime = .2,
				scrollDistance = 200,
				mobile_ie = -1 !== navigator.userAgent.indexOf("IEMobile");

			function smoothScrollListener(event) {
				if ($(event.target).closest('.select2-dropdown').length) return false;

				event.preventDefault();

				var delta = event.wheelDelta / 120 || -event.detail / 3,
					scrollTop = $window.scrollTop(),
					finalScroll = scrollTop - parseInt(delta * scrollDistance);

				TweenLite.to($window, scrollTime, {
					scrollTo: {
						y: finalScroll,
						autoKill: !0
					},
					ease: Power1.easeOut,
					autoKill: !0,
					overwrite: 5
				});
			}

			if (!Modernizr.touchevents && !mobile_ie && isActive) {
				if (window.addEventListener) {
					window.addEventListener('mousewheel', smoothScrollListener, false);
					window.addEventListener('DOMMouseScroll', smoothScrollListener, false);
				}
			}
		},

		mainSlider : function() {
			$.fn.mainSliderApi = function() {
				var slider = $(this),
					isBig = slider.hasClass('main-slider-big') ? true : false,
					items = slider.find('.item'),
					animateClass;

				function setSliderHeight(extraHeight) {
					if(screenWidth > 767) {
						items.css({
							height: screenHeight + extraHeight
						});
					} else {
						items.css({
							height: screenHeight
						});
					}

					$window.trigger('sliderHeightSet');
				}

				if(isBig) {
					setSliderHeight(0);

					$window.on('resized', function() {
						setSliderHeight(0);
					});
				}

				slider.find('[data-animate-in], [data-animate-out]').addClass('animated');

				if(items.length < 2) {
					slider.find('.carousel-indicators').addClass('hidden');
					slider.find('.carousel-control').addClass('hidden');
				}

				function animation(dir) {
					slider.find('.active [data-animate-' + dir + ']').each(function () {
						var self = $(this);
						animateClass = self.data('animate-' + dir);

						self.addClass(animateClass);
					});
				}

				function animationReset(dir) {
					slider.find('[data-animate-' + dir + ']').each(function () {
						var self = $(this);
						animateClass = self.data('animate-' + dir);

						self.removeClass(animateClass);
					});
				}

				if (Modernizr.cssanimations) {
					animation('in');

					slider.on('slid.bs.carousel', function () {
						animationReset('out');
						setTimeout(function () {
							animation('in');
						}, 0);
					});
					slider.on('slide.bs.carousel', function () {
						animationReset('in');
						setTimeout(function () {
							animation('out');
						}, 0);
					});
				}

				if (Modernizr.touchevents) {
					slider.find('.carousel-inner').swipe({
						swipeLeft: function() {
							$(this).parent().carousel('prev');
						},
						swipeRight: function() {
							$(this).parent().carousel('next');
						},
						threshold: 30
					});
				}
			};

			var mainSlider = $('#main-slider');

			mainSlider.carousel({interval: mainSlider.data('interval'), pause: 'none'}).mainSliderApi();
		},

		flySliderInit : function() {
			$.fn.flySlider = function() {
				var IE = false;

				if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.appVersion.indexOf('Trident/') > 0) {
					IE = true;
				}

				var flySlider = $('.fly-slider'),
					cube = flySlider.find('.cube'),
					slides = flySlider.find('.slide'),
					slidesContent = flySlider.find('.slide-content'),
					slidesContentRotationDelay = 0,
					slidesQt = slides.length,
					sliderControls = flySlider.find('.slider-control'),
					rotationCounter = 0,
					slideOffset = 50 / Math.tan(Math.PI / slidesQt),
					rotationDuration = flySlider.data('rotation-duration') ? flySlider.data('rotation-duration') : 1000,
					autoInterval = flySlider.data('rotation-interval') ? flySlider.data('rotation-interval') : 10000,
					autoRotationInterval,
					isAnimating = false,
					isFrozen = false;

				$window.on('resize', function() {
					cube.css({
						height: screenHeight
					});
				});

				if(slidesQt < 2) {
					sliderControls.addClass('hidden');
					flySlider.removeClass('invisible');
					slides.addClass('active');

					return;
				}

				flySlider.addClass('slides' + slidesQt);

				slidesContent.css({
					transition: 'transform ' + (rotationDuration / 1000 + slidesContentRotationDelay) + 's ease'
				});

				$window.on('resize', function() {
					if(!IE) {
						slides.each(function(index) {
							$(this).css({
								transform: 'rotate3d(1, 0, 0, ' + (index * 360 / slidesQt) + 'deg) translate3d(0, 0, ' + parseInt(slideOffset * screenHeight / 100) + 'px)',
								transition: 'all ' + rotationDuration / 1000 + 's ease'
							});
						});

						cube.css({
							transform:  'translate3d(0,0, -' + parseInt(slideOffset * screenHeight / 100) + 'px) rotate3d(1, 0, 0, ' + (-rotationCounter * 360 / slidesQt) + 'deg)',
							transition: 'all ' + rotationDuration / 1000 + 's ease' // 'transition: all' - needed for IOS
						});
					} else {
						slides.css({
							//msTransformOrigin: '50% 50% -' + parseInt(slideOffset * screenHeight / 100) + 'px',
							transformOrigin: '50% 50% -' + parseInt(slideOffset * screenHeight / 100) + 'px',
							transition: 'all ' + rotationDuration / 1000 + 's ease'
						});
					}
				});

				function rotateCube(count) {
					var counter = count % slidesQt;

					flySlider.trigger('fly.transition.start');

					if(!IE) {
						cube.css({
							transform:  'translate3d(0,0, -' + parseInt(slideOffset * screenHeight / 100) + 'px) rotate3d(1, 0, 0, ' + (-count * 360 / slidesQt) + 'deg)'
						});
					} else {
						slides.each(function(index) {
							$(this).css({
								transform: 'rotate3d(1, 0, 0, ' + (index - count) * (360 / slidesQt) + 'deg)'
							});
						});
					}

					slides.removeClass('active prev next').eq(counter).addClass('active');
					slides.eq(counter - 1).addClass('prev');

					if(counter + 1 === slidesQt) {
						slides.eq(0).addClass('next');
					} else {
						slides.eq(counter + 1).addClass('next');
					}

					setTimeout(function() {
						isAnimating = false;

						flySlider.trigger('fly.transition.end');
					}, rotationDuration);
				}

				rotateCube(rotationCounter);

				setTimeout(function() {
					flySlider.removeClass('invisible');
				}, rotationDuration);

				//Click Event
				sliderControls.on('click', function() {
					if (isAnimating) return;

					clearInterval(autoRotationInterval);
					setAutoRotationInterval();

					isAnimating = true;

					if($(this).hasClass('prev')) {
						rotationCounter--;
					} else {
						rotationCounter++;
					}

					rotateCube(rotationCounter);
				});

				//MouseWheel Event
				/*flySlider.on('mousewheel', function(event) {
				 if (isAnimating) return;

				 clearInterval(autoRotationInterval);
				 setAutoRotationInterval();

				 isAnimating = true;

				 if(event.deltaY > 0) {
				 rotationCounter--;
				 } else {
				 rotationCounter++;
				 }

				 rotateCube(rotationCounter);
				 });*/

				//KeyDown Event
				if(flySlider.length) {
					$window.on('keydown', function(event) {
						if (isAnimating) return;

						clearInterval(autoRotationInterval);
						setAutoRotationInterval();

						isAnimating = true;

						if(event.keyCode === 37) {
							rotationCounter--;
						} else if(event.keyCode === 39) {
							rotationCounter++;
						}

						rotateCube(rotationCounter);
					});
				}

				//Swipe Event
				flySlider.swipe({
					swipeLeft:function(event, direction, distance, duration, fingerCount) {
						if (isAnimating) return;

						clearInterval(autoRotationInterval);
						setAutoRotationInterval();

						isAnimating = true;

						rotationCounter--;

						rotateCube(rotationCounter);
					},
					swipeRight:function(event, direction, distance, duration, fingerCount) {
						if (isAnimating) return;

						clearInterval(autoRotationInterval);
						setAutoRotationInterval();

						isAnimating = true;

						rotationCounter++;

						rotateCube(rotationCounter);
					},
					threshold: 100,
					fingers: 'all',
					excludedElements: ''
				});

				//AutoAdvance
				$window.on('blur', function() {
					isFrozen = true;
				});

				$window.on('focus', function() {
					isFrozen = false;
				});

				function setAutoRotationInterval() {
					autoRotationInterval = setInterval(function() {
						if (isFrozen) return;

						isAnimating = true;

						rotationCounter++;

						rotateCube(rotationCounter);
					}, autoInterval);
				}

				setAutoRotationInterval();
			};

			$('.fly-slider').each(function () {
				$(this).flySlider();
			});
		},

		lastItemLabel : function(selector) {
			$(selector).each(function() {
				$(this).children().eq(-1).addClass('last');
			});
		},

		parallaxInit : function() {
			$.fn.parallax = function() {
				var parallax = $(this),
					xPos = parallax.data('parallax-position') ? parallax.data('parallax-position') : 'center',
					speed = parallax.data('parallax-speed') || parallax.data('parallax-speed') == 0 ? parallax.data('parallax-speed') : .1;

				function runParallax() {
					var scrollTop = $window.scrollTop(),
						offsetTop = parallax.offset().top,
						parallaxHeight = parallax.outerHeight();

					if (scrollTop + screenHeight > offsetTop && offsetTop + parallaxHeight > scrollTop) {
						var yPos = parseInt((offsetTop - scrollTop) * speed, 10);

						parallax.css({
							backgroundPosition: xPos + ' ' + yPos + 'px'
						});
					}
				}

				if (screenWidth > 1000 && !parallax.hasClass('parallax-disabled')) {
					parallax.css({
						backgroundAttachment: 'fixed'
					});
					runParallax();
				}
				$window.on('scroll', function () {
					if (screenWidth > 1000 && !parallax.hasClass('parallax-disabled')) {
						parallax.css({
							backgroundAttachment: 'fixed'
						});
						runParallax();
					}
				});
				$window.on('resized', function () {
					if (screenWidth > 1000 && !parallax.hasClass('parallax-disabled')) {
						parallax.css({
							backgroundAttachment: 'fixed'
						});
						runParallax();
					} else {
						parallax.css({
							backgroundPosition: '50% 0',
							backgroundAttachment: 'scroll'
						});
					}
				});
			};

			$('.parallax').each(function () {
				$(this).parallax();
			});
		},

		lightBox : function() {
			$('.swipebox, .swipebox-video').swipebox({
				removeBarsOnMobile: false,
				autoplayVideos: true
			});
		},

		owlSlidersInit : function() {
			// Testimonials-slider
			$('.testimonials-slider').owlCarousel({
				singleItem: true,
				navigation : true,
				navigationText : ['', ''],
				pagination : false
			});

			// Slider on Gallery Post Type
			$('.post-slider').owlCarousel({
				singleItem: true,
				navigation : true,
				navigationText : ['', ''],
				pagination : true
			});

			// Twitter Slider
			$('.twitter-slider').owlCarousel({
				singleItem: true,
				navigation : true,
				navigationText : ['', ''],
				pagination : false
			});
		},

		statsCounter : function(infinite) {
			$('.js-counter').each(function () {
				var counter = $(this),
					countTo = counter.text(),
					countTime = counter.data('duration') ? counter.data('duration') : 3,
					countStep = counter.data('step') ? counter.data('step') : .1,
					count = 0,
					counting = false,
					done = false;

				function countSkills() {
					counter.text('0');
					counting = true;

					if (!infinite) done = true;

					var	interval = setInterval(function () {
						count = count + 1;
						counter.text(parseInt(countTo * count * countStep / countTime, 10));

						if (count >= countTime / countStep) {
							//counting = false;
							count = 0;
							clearInterval(interval);
						}
					}, countStep * 1000);
				}

				$window.on('scroll', function() {
					var top = counter.offset().top,
						bottom = counter.outerHeight() + top,
						scrollTop = $(this).scrollTop();

					top = top - screenHeight;

					if ((scrollTop > top) && (scrollTop < bottom) && !done) {
						if (!counting) {
							countSkills();
						}
					} else {
						counting = false;
					}
				});
			});
		},

		progressCalc : function() {
			$('.fly-project').each(function() {
				var self = $(this),
					progressLabel = self.find('.progress-label'),
					progressBar = self.find('.progress-bar'),
					raised = self.find('[data-raised]').data('raised'),
					goal = self.find('[data-goal]').data('goal'),
					percent = parseInt(raised / goal * 100),
					progressAnimated = false;

				progressLabel.css({left: 0 + '%'}).text('0%');
				progressBar.css({width: 0 + '%'});

				if (percent > 100) percent = 100;

				$window.on('scroll resized', function() {
					if (progressAnimated) return;

					if(self.offset().top < $window.scrollTop() + screenHeight * .6) {
						progressAnimated = true;

						for(var i = 1; i < 21; i++) {
							var timeOuted = function(i) {
								return setTimeout(function() {
									progressLabel.css({left: percent*i/20 + '%'}).text(parseInt(percent*i/20) + '%');
									progressBar.css({width: percent*i/20 + '%'});

									if(i === 20 && percent === 100) {
										self.addClass('complete');
									}
								}, i*200);
							};

							timeOuted(i);
						}
					}
				});
			});
		},

		headerVideo : function() {
			var videoSlider = $('.slider-video-resize');

			function resizeVideo() {
				$('.video-container').each(function () {
					var container = $(this),
						video = container.find('.video'),
						ratio = video.attr('width') / video.attr('height'),
						containerWidth = container.width(),
						containerHeight = container.height();

					if (containerWidth / containerHeight < ratio) {
						video.css({
							width: containerHeight * ratio,
							height: containerHeight
						});

						var videoWidth = video.width();

						video.css({
							marginLeft: (containerWidth - videoWidth) / 2
						});
					} else {
						video.css({
							width: containerWidth,
							height: containerWidth / ratio,
							marginLeft: 0
						});
					}
				});
			}

			$window.on('resized', function() {
				resizeVideo();
			});

			videoSlider.on('fly.transition.end', function() {
				resizeVideo();
			});

			videoSlider.on('slid.bs.carousel', function() {
				resizeVideo();
			});
		},

		thumbnailSlider : function() {
			$.fn.imageSliderApi = function () {
				var slider = $(this),
					imagesWrap = slider.find('.slider-images-wrap'),
					images = slider.find('.slider-images'),
					thumbsWrap = slider.find('.slider-thumbs-wrap'),
					thumbs = slider.find('.slider-thumbs'),
					prev = slider.find('.prev'),
					next = slider.find('.next'),
					description = images.find('.description'),
					descriptionOpen = slider.find('.description-open'),
					sliderHeight = slider.data('height') ? slider.data('height') : 400;

				if(screenWidth < 1024) {
					sliderHeight = sliderHeight / 1.4;
				}

				if(screenWidth < 480) {
					sliderHeight = sliderHeight / 1.6;
				}

				images.trigger('destroy');
				thumbs.trigger('destroy');

				images.find('li').removeClass().css({
					width: imagesWrap.width(),
					height: sliderHeight
				});

				thumbsWrap.css({
					height: sliderHeight + 2
				});

				thumbs.find('li').removeClass().css({
					width: thumbsWrap.width(),
					height: (sliderHeight + 2) / 3 - 2
				});

				images.carouFredSel({
					prev : prev,
					next : next,
					circular: false,
					infinite: false,
					items: 1,
					auto: false,
					scroll: {
						fx: 'quadratic',
						onBefore: function() {
							var pos = $(this).triggerHandler('currentPosition');

							thumbs.find('li').removeClass('active');
							thumbs.find('li.item' + pos).addClass('active');

							if(pos < 1) {
								thumbs.trigger('slideTo', [pos, true]);
							} else {
								thumbs.trigger('slideTo', [pos - 1, true]);
							}
						}
					},
					onCreate: function() {
						images.find('li').each(function(i) {
							$(this).addClass('item' + i);
						});
					}
				}).trigger('slideTo', [0, true]);

				thumbs.carouFredSel({
					direction: 'up',
					auto: false,
					infinite: false,
					circular: false,
					scroll: {
						items : 1
					},
					onCreate: function() {
						thumbs.find('li').each(function(i) {
							$(this).addClass( 'item' + i ).on('click', function() {
								images.trigger('slideTo', [i, true]);
							});
						});
						thumbs.find('.item0').addClass('active');
					}
				});

				if (Modernizr.touchevents) {
					images.swipe({
						swipeLeft: function() {
							images.trigger('next');
						},
						swipeRight: function() {
							images.trigger('prev');
						},
						threshold: 50,
						excludedElements: ''
					});
				}

				description.find('.description-close').on('click', function() {
					description.removeClass('active');
					descriptionOpen.addClass('active');
				});

				descriptionOpen.on('click', function() {
					description.addClass('active');
					descriptionOpen.removeClass('active');
				});
			};

			var imageSlider = $('.thumbnail-slider');

			if(imageSlider.length) {
				$window.on('load resized', function() {
					imageSlider.each(function() {
						$(this).imageSliderApi();
					});
				});
			}
		},

		additionalInit : function() {
			// Write here some JS




		}
	};

	fly.init();
});