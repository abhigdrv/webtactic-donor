<!--Start Leftbar -->
        <div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                <div class="logobar">
                    <a href="index.html" class="logo logo-large"><img src="{{ asset('admin_assets/images/logo.png') }}" class="img-fluid" alt="logo"></a>
                    <a href="index.html" class="logo logo-small"><img src="{{ asset('admin_assets/images/logo.png') }}" class="img-fluid" alt="logo"></a>
                </div>
                <!-- End Logobar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">                        
                        <!-- <li>
                            <a href="javaScript:void();">
                                <img src="{{ asset('admin_assets/images/svg-icon/maps.svg') }}" class="img-fluid" alt="maps"><span>Maps</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="map-google.html">Google</a></li>
                                <li><a href="map-vector.html">Vector</a></li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="{{ url('/admin')}}">
                                <img src="{{ asset('admin_assets/images/svg-icon/dashboard.svg') }}" class="img-fluid" alt="widgets"><span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/category')}}">
                                <img src="{{ asset('admin_assets/images/svg-icon/maps.svg') }}" class="img-fluid" alt="widgets"><span>Category</span>
                            </a>
                        </li>                        
                        <!-- <li>
                            <a href="{{ url('/admin/subcategory')}}">
                                <img src="{{ asset('admin_assets/images/svg-icon/basic.svg') }}" class="img-fluid" alt="widgets"><span>Subcategory</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="{{ url('/admin/donation')}}">
                                <img src="{{ asset('admin_assets/images/svg-icon/basic.svg') }}" class="img-fluid" alt="widgets"><span>Donation</span>
                            </a>
                        </li>                             
                        <li>
                            <a href="{{ url('/admin/add-donar')}}">
                                <img src="{{ asset('admin_assets/images/svg-icon/icons.svg') }}" class="img-fluid" alt="widgets"><span>Donor</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="{{ url('/admin/add-user')}}">
                                <img src="{{ asset('admin_assets/images/svg-icon/user.svg') }}" class="img-fluid" alt="widgets"><span>Users</span>
                            </a>
                        </li> -->
                        <!-- <li>
                            <a href="{{ url('/admin/report')}}">
                                <img src="{{ asset('admin_assets/images/svg-icon/widgets.svg') }}" class="img-fluid" alt="widgets"><span>Report</span><span class="badge badge-success pull-right">New</span>
                            </a>
                        </li> -->
                        <li class="active">
                            <a href="">
                                <img src="{{ asset('admin_assets/images/svg-icon/maps.svg') }}" class="img-fluid" alt="maps"><span>Report</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu menu-open" style="display: none;">
                                <li><a href="{{ url('/admin/report')}}">Master Report</a></li>
                                <li><a href="{{ url('/admin/donor-wise-report')}}">Amount Wise</a></li>
                                <!-- <li><a href="{{ url('/admin/category-wise-report')}}">Category Wise</a></li>
                                <li><a href="{{ url('/admin/subcategory-wise-report')}}">Subcategory Wise</a></li>
                                <li><a href="{{ url('/admin/date-wise-report')}}">Date Wise Wise</a></li>
                                <li><a href="{{ url('/admin/week-wise-report')}}">Week Wise</a></li> -->
                                <li><a href="{{ url('/admin/custom-date-wise-report')}}">Custom Date Wise</a></li>
                                <!-- <li><a href="{{ url('/admin/area-wise-report')}}">Area Wise</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- End Navigationbar -->
            </div>
            <!-- End Sidebar -->
        </div>
        <!-- End Leftbar