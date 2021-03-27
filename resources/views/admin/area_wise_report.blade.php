<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Add Donor</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.ico')}}">
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="{{ asset('admin_assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <!-- Apex css -->
    <link href="{{ asset('admin_assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet">
    <!-- Slick css -->
    <link href="{{ asset('admin_assets/plugins/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/plugins/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">    
    
    @include('admin/infobar')
    <!-- Start Containerbar -->
    <div id="containerbar">
        @include('admin/sidebar')
        <!-- Start Rightbar -->
        <div class="rightbar">
            @include('admin/topbar')
            <!-- Start Breadcrumbbar -->                    
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">Report</h4>
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Report</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Actions</button>
                        </div>                        
                    </div>
                </div>          
            </div>
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->    
            <div class="contentbar">
              <!-- Start row -->
              <div class="row">
                <!-- Start col -->
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                      dfghj
                    </div>
                </div>
                  <!-- End col -->
              </div>   
              <!-- End row -->
            </div>
            <!-- End Contentbar -->
            @include('admin/footer')
        </div>
        <!-- End Rightbar -->
    </div>
    <!-- End Containerbar-->
    <!-- Start js -->        
    <script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/detect.js') }}"></script>
    <script src="{{ asset('admin_assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin_assets/js/vertical-menu.js') }}"></script>
    <!-- Switchery js -->
    <script src="{{ asset('admin_assets/plugins/switchery/switchery.min.js') }}"></script>
    <!-- Apex js -->
    <script src="{{ asset('admin_assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/apexcharts/irregular-data-series.js') }}"></script>    
    <!-- Slick js -->
    <script src="{{ asset('admin_assets/plugins/slick/slick.min.js') }}"></script>
    <!-- Custom Dashboard js -->   
    <script src="{{ asset('admin_assets/js/custom/custom-dashboard.js') }}"></script>
    <!-- Core js -->
    <script src="{{ asset('admin_assets/js/core.js') }}"></script>
    <!-- End js -->
</body>
</html>