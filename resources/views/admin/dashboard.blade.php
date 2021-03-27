<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Orbiter - Bootstrap Minimal & Clean Admin Template</title>
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
                        <h4 class="page-title">Dashboard</h4>
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                    <div class="col-lg-12 col-xl-6">
                        <!-- Start row -->
                        <div class="row">
                            <!-- Start col -->
                            <!-- <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-header">                                
                                        <div class="row align-items-center">
                                            <div class="col-9">
                                                <h5 class="card-title mb-0">Revenue Statistics</h5>
                                            </div>
                                            <div class="col-3">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 font-18 float-right" type="button" id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                                        <a class="dropdown-item font-13" href="#">Refresh</a>
                                                        <a class="dropdown-item font-13" href="#">Export</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body py-0">
                                        <div class="row align-items-center">
                                            <div class="col-lg-3">
                                                <div class="revenue-box border-bottom mb-2">
                                                    <h4>+ 4598</h4>
                                                    <p>Inward Amount</p>
                                                </div>
                                                <div class="revenue-box">
                                                    <h4>- 296</h4>
                                                    <p>Outward Amount</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div id="apex-line-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- End col --> 
                            <!-- Start col -->
                            <!-- <div class="col-lg-6 col-xl-6">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="media">
                                            <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                                            <div class="media-body">
                                                <p class="mb-0">Projects</p>
                                                <h5 class="mb-0">85</h5>                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- End col -->
                            <!-- Start col -->
                            <!-- <div class="col-lg-6 col-xl-6">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="media">
                                            <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-clipboard"></i></span>
                                            <div class="media-body">
                                                <p class="mb-0">Tasks</p>
                                                <h5 class="mb-0">259</h5>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- End col -->
                        </div>
                        <!-- End row -->                        
                    </div>
                    <!-- End col -->                    
                    <!-- Start col -->
                    <!-- <div class="col-lg-12 col-xl-6">
                        <div class="card m-b-30 dash-widget">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <h5 class="card-title mb-0">Index</h5>
                                    </div>
                                    <div class="col-7">
                                        <ul class="nav nav-pills float-right" id="pills-index-tab-justified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-sales-tab-justified" data-toggle="pill" href="#pills-sales-justified" role="tab" aria-selected="true">Sales</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-clients-tab-justified" data-toggle="pill" href="#pills-clients-justified" role="tab" aria-selected="false">Clients</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body py-0 pl-0 pr-2">
                                <div id="apex-bar-chart"></div>
                            </div>
                        </div>
                    </div> -->
                    <!-- End col -->
                </div>
                <!-- End row -->
                <div class="row">
                    <!-- Start col -->
                            <div class="col-lg-4 col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="media">
                                            <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                                            <div class="media-body">
                                                <p class="mb-0">No of Donors</p>
                                                <h5 class="mb-0">{{$donors}}</h5>                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                            <!-- Start col -->
                            <div class="col-lg-4 col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="media">
                                            <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-clipboard"></i></span>
                                            <div class="media-body">
                                                <p class="mb-0">Total Donation Received</p>
                                                <h5 class="mb-0">{{$donation}}</h5>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                            <!-- Start col -->
                            <div class="col-lg-4 col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="media">
                                            <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-clipboard"></i></span>
                                            <div class="media-body">
                                                <p class="mb-0">No of Categories</p>
                                                <h5 class="mb-0">{{$categories}}</h5>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                </div>

                
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