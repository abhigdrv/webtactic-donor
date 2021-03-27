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
                        <h4 class="page-title">Donation</h4>
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Donation</li>
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
                      <div class="table-responsive">
                        <table id="default-datatable4" class="table table-bordered" style="width: 100%">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Sr No</th>
                                <th>Receipt No</th>
                                <th>Date</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($donation as $don)
                              <tr>
                                <?php
                                $cat_name = \App\Category::where('id', $don->category_id)->get()->pluck('category_name')->first() ?>
                                  <td>{{$don->id}}</td>
                                  <td>{{$cat_name}}</td>
                                  <td>{{$don->subcategory_id}}</td>
                                  <td>{{$don->sr_no}}</td>
                                  <td>{{$don->receipt_no}}</td>
                                  <td>{{$don->date}}</td>
                                  
                              </tr>
                              <tr>
                                <th>Donor</th>
                                <th>Amount</th>
                                <th>Company Name</th>
                                <th>Payment Mode</th>
                                <th>Payment Name</th>
                                <th>Transaction Id</th>
                              </tr>
                              <tr>
                                  <td>{{$don->donar}}</td>
                                  <td>{{$don->amount}}</td>
                                  <td>{{$don->company_name}}</td>
                                  <td>{{$don->payment_mode}}</td>
                                  <td>{{$don->payment_name}}</td>
                                  <td>{{$don->transaction_id}}</td>
                              </tr>
                              
                              <tr>
                                <th>Bank</th>
                                <th>Address</th>
                                <th>PAN No</th>
                                <th>Aadhar</th>
                                <th>Mobile No</th>
                                <th>Email Id</th>
                              </tr>

                              <tr>
                                <td>{{$don->bank}}</td>
                                <td>{{$don->address}}</td>
                                <td>{{$don->pan_no}}</td>
                                <td>{{$don->aadhar}}</td>
                                <td>{{$don->mobile_no}}</td>
                                <td>{{$don->email_id}}</td>
                              </tr>
                              <tr>                                
                                <th>Date of Birth</th>
                                <th>Reference</th>
                                <th>Comment</th>
                                <th>Cheque Number</th>
                                <th>Cheque Issued By</th>
                                <th>Beneficiary Name</th>
                              </tr>
                              <tr>                                
                                <td>{{$don->dob}}</td>
                                <td>{{$don->refrence}}</td>
                                <td>{{$don->comment}}</td>
                                <td>{{$don->cheque_number}}</td>
                                <td>{{$don->cheque_issued_by}}</td>
                                <td>{{$don->beneficiary_name}}</td>
                              </tr>
                              <tr>                                
                                <th>Cash Address</th>
                              </tr>
                              <tr>                                
                                <td>{{$don->cash_address}}</td>
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
              $("#cheque_date").addClass('d-none');
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