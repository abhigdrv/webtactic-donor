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

    <!-- DataTables css -->
    <link href="{{ asset('admin_assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
                                <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Home</a></li>
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
                    <!-- Start col -->
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">Data Export Table</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">                                	
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Donor</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Amount</th>
                                            <th>Mobile No</th>
                                            <th>Email Id</th>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td>Donor</td>
                                            <td>Category</td>
                                            <td>Subcategory</td>
                                            <td>Amount</td>
                                            <td>Mobile No</td>
                                            <td>Email Id</td>
                                        </tr>
                                        </thead>                                        
                                        <tbody>
                                        @foreach($donar as $don)                                    
                                        <tr>
                                        	<?php $cat_name = \App\Category::where('id', $don->category_id)->get()->pluck('category_name')->first() ?>
                                            <td>{{ $don->date }}</td>
                                            <td>{{ $don->donar }}</td>
                                            <td>{{ $cat_name }}</td>
                                            <td>{{ $don->subcategory_id }}</td>
                                            <td>{{ $don->amount }}</td>
                                            <td>{{ $don->mobile_no }}</td>
                                            <td>{{ $don->email_id }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
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
    <!-- Datatable js -->
    <script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/custom-table-datatable.js') }}"></script>
    <script type="text/javascript">
    	/* Custom filtering function which will search data in column four between two values */
		$(document).ready(function() {
		    // Setup - add a text input to each footer cell
		    $('#datatable-buttons thead td').each( function () {
		        var title = $('#datatable-buttons thead td').eq( $(this).index() ).text();
		        $(this).html( '<input class="form-control form-control-sm" type="text" placeholder="Search '+title+'" />' );
		    } );
		 
		    // DataTable
		    var table = $('#datatable-buttons').DataTable();
		 
		    // Apply the search
		    table.columns().every( function () {
		        var that = this;
		 
		        $( 'input', this.footer() ).on( 'keyup change', function () {
		            that
		                .search( this.value )
		                .draw();
		        } );
		    } );
		} );
    </script>
</body>
</html>