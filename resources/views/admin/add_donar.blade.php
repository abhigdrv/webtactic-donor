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
                        <h4 class="page-title">Add Donor</h4>
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Add Donor</a></li>
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
                          <form method="POST" action="{{ url('/admin/add-donar') }}" enctype="multipart/form-data">
                            @csrf
                            <h3>Enter Your Details</h3><br>
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Donar Name</label>
                                  <input type="text" name="donar" class="form-control" placeholder="Donar Name" aria-describedby="basic-addon5" maxlength="30"/>
                                </div>
                              </div>
                              <div class="col-md-3" id="date_of_birth">
                                <div class="form-group">
                                  <label>Date of Birth</label>
                                  <input type="date" name="dob" class="form-control" placeholder="" aria-describedby="basic-addon5"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Company Name</label>
                                  <input type="text" name="company_name" class="form-control" placeholder="Company Name" aria-describedby="basic-addon5" />
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" name="address" class="form-control" placeholder="Address" aria-describedby="basic-addon5" maxlength="150"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Phone</label>
                                  <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No" aria-describedby="basic-addon5" maxlength="12"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Email Id</label>
                                  <input type="text" name="email_id" class="form-control" placeholder="Email Id" aria-describedby="basic-addon5" maxlength="50"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>PAN No</label>
                                  <input type="text" name="pan_no" class="form-control" placeholder="PAN No" aria-describedby="basic-addon5" maxlength="10"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Aadhar Number</label>
                                  <input type="text" name="aadhar" class="form-control" placeholder="Aadhar Number" aria-describedby="basic-addon5" maxlength="12"/>
                                </div>
                              </div>
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
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                      <div class="table-responsive">
                        <table id="default-datatable4" class="table table-bordered" style="width: 100%">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Donor Name</th>
                                <th>Date of Birth</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Mobile No</th>
                                <th>Email Id</th>
                                <th>PAN No</th>
                                <th>Aadhar</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($donar as $don)
                              <tr>
                                  <td>{{$don->id}}</td>
                                  <td>{{$don->donar}}</td>
                                  <td>{{$don->dob}}</td>
                                  <td>{{$don->company_name}}</td>
                                  <td>{{$don->address}}</td>
                                  <td>{{$don->mobile_no}}</td>
                                  <td>{{$don->email_id}}</td>
                                  <td>{{$don->pan_no}}</td>
                                  <td>{{$don->aadhar}}</td>
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
    <script type="text/javascript">
      $( document ).ready(function() {
          $("#bank_name").addClass('d-none');
          $("#receipt_id").addClass('d-none');
          $("#cheque_number").addClass('d-none');
          $("#cheque_date").addClass('d-none');
          $("#issued_by").addClass('d-none');
          $("#beneficiary_name").addClass('d-none');
          $("#name_of_person").addClass('d-none');
          $("#cash_address").addClass('d-none');
          $("#transaction_id").addClass('d-none');
          $('#payment_mode').change(function() {
            if($(this).val()== 'Cheque')
            {
              $("#issued_by").removeClass('d-none');
              $("#cheque_number").removeClass('d-none');
              $("#cheque_date").removeClass('d-none');
              $("#beneficiary_name").addClass('d-none');
              $("#bank_name").removeClass('d-none');
              $("#name_of_person").addClass('d-none');
              $("#receipt_id").addClass('d-none');
              $("#transaction_id").addClass('d-none');
              $("#cash_address").addClass('d-none');    
            }
            if($(this).val()== 'Online Transfer')
            {
              $("#cheque_number").addClass('d-none');
              $("#cheque_date").addClass('d-none');
              $("#beneficiary_name").removeClass('d-none');
              $("#cheque_date").removeClass('d-none');
              $("#bank_name").removeClass('d-none');
              $("#receipt_id").addClass('d-none');
              $("#name_of_person").addClass('d-none');
              $("#issued_by").addClass('d-none');
              $("#transaction_id").removeClass('d-none');
              $("#cash_address").addClass('d-none');    
            }
            if($(this).val()== 'Cash')
            {
              $("#bank_name").addClass('d-none');
              $("#beneficiary_name").addClass('d-none');
              $("#receipt_id").addClass('d-none');
              $("#cheque_number").addClass('d-none');
              $("#name_of_person").removeClass('d-none');
              $("#cheque_date").removeClass('d-none');
              $("#transaction_id").addClass('d-none');
              $("#issued_by").addClass('d-none');
              $("#cash_address").removeClass('d-none');    
            }
          });
          $('#category_id').change(function() {
            var categoryId = $(this).val()
            $.get('get-subcategory', { category_id: categoryId}, 
              function(returnedData){
                $('#subcategory_id').empty();
                $('#subcategory_id').append('<option value="">Select</option>');
                $.each(returnedData.success,function(index,obj)
                {
                $('#subcategory_id').append('<option>'+obj+'</option>');
                });
                $('#subcategory_id').append('<option value="NA">NA</option>');
              });
          });
      });
    </script>
</body>
</html>