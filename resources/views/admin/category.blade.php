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
    <!-- Sweet Alert css -->
    <link href="{{ asset('admin_assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
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
                        <h4 class="page-title">Category</h4>
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                        <div class="card-body">
                          @if (\Session::has('success'))                          
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {!! \Session::get('success') !!}
                            </div>
                          @endif

                            @if (\Session::has('warning'))                          
                              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                {!! \Session::get('warning') !!}
                              </div>
                          @endif
                          @if (\Session::has('fail'))
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                 {!! \Session::get('fail') !!}
                              </div>
                          @endif
                          <form method="POST" action="{{ url('/admin/category') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">                              
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Category Name</label>
                                  <input type="text" name="category_name" placeholder="Category Name" class="form-control">
                                </div>
                              </div>
                              <!-- <div class="col-md-3">
                                <div class="form-group">
                                  <label>Category Code</label>
                                  <input type="text" name="category_code" class="form-control" placeholder="Category Code" aria-describedby="basic-addon5" />
                                </div>
                              </div> -->
                              <div class="col-md-3">
                                <div class="form-group">
                                  <br>
                                  <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                  </div>
                  <!-- End col -->
              </div>   
              <!-- End row -->
              <!-- Start row -->
              <div class="row">
                <!-- Start col -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card m-b-30">
                      <div class="table-responsive">
                        <table id="default-datatable4" class="table table-bordered" style="width: 100%">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($categories as $category)
                              <tr>
                                  <td>{{$category->id}}</td>
                                  <td>{{$category->category_name}}</td>
                                  <td>
                                    <div class="sweet-alert">
                                        <button type="button" data-id="{{$category->id}}" class="btn btn-primary add-subcategory-sa-ajax" id="add-subcategory-sa-ajax"><small><i class="mdi mdi-border-all"></i> Add Subcategory</small></button>
                                        <button type="button" data-id="{{$category->id}}" class="btn btn-danger sa-params" id="sa-params"><small><i class="mdi mdi-delete"></i> Delete</small></button>
                                        <button type="button" data-id="{{$category->id}}" class="edit-category-sa-ajax btn btn-primary" id="edit-category-sa-ajax"><small><i class="mdi mdi-square-edit-outline"></i> Edit</small></button>
                                    </div>
                                  </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                  <!-- End col -->
                  <!-- Start col -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card m-b-30">
                      <div class="table-responsive">
                        <table id="default-datatable4" class="table table-bordered" style="width: 100%">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Subcategory Name</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($subcategories as $subcategory)
                              <tr>
                                  <td>{{$subcategory->id}}</td>
                                  <td>{{$subcategory->subcategory_category}}</td>
                                  <td>{{$subcategory->subcategory_name}}</td>
                                  <td>
                                    <div class="sweet-alert">
                                        <button type="button" data-id="{{$subcategory->id}}" class="btn btn-danger delete-subcat-sa-params" id="sa-params"><small><i class="mdi mdi-delete"></i> Delete</small></button>
                                        <button type="button" data-id="{{$subcategory->id}}" class="edit-subcategory-sa-ajax btn btn-primary" id="edit-subcategory-sa-ajax"><small><i class="mdi mdi-square-edit-outline"></i> Edit</small></button>
                                    </div>
                                  </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                      </div>
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
    <!-- Sweet-Alert js -->
    <script src="{{ asset('admin_assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/custom-sweet-alert.js') }}"></script>
</body>
</html>