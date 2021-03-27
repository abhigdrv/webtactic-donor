<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Donation</title>
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
                        <h4 class="page-title">Edit Donation</h4>
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Edit Donation</a></li>
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
                          <form method="POST" action="{{ url('/admin/edit-donation') }}" enctype="multipart/form-data">
                            @csrf
                            <h3>Select Category</h3><br>
                            <div class="row">                              
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Donation Category</label>
                                  <select class="form-control" name="category_id" id="category_id" required>
                                    <!-- <option value="">Select</option> -->
                                    <option selected value="{{$donation->category_id}}"><?= \App\Category::where('id', $donation->category_id)->pluck('category_name')->first(); ?></option>
                                    {{--@foreach($categories as $category)
                                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach--}}
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Donation Subategory</label>                                  
                                  <select class="form-control" name="subcategory_id" id="subcategory_id" required>
                                    <option selected value="{{$donation->subcategory_id}}"><?= \App\SubCategory::where('id', $donation->subcategory_id)->pluck('subcategory_name')->first(); ?></option>
                                    <!-- <option value="">Select</option> -->
                                  </select>
                                </div>
                              </div>
                            </div>
                            <br>
                            <h3>Basic Details</h3><br>
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Sr Number</label>
                                  <input type="text" value="{{$donation->sr_no}}" name="sr_no" placeholder="Sr Number" class="form-control" readonly required>
                                  <input type="text" name="donation_id" value="{{$donation->id}}" class="d-none">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Receipt No</label>
                                  <input type="text" name="receipt_no" value="{{$donation->receipt_no}}" class="form-control" placeholder="Receipt No" aria-describedby="basic-addon5" required maxlength="12"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Date</label>
                                  <input type="date" value="{{$donation->date}}" name="date" class="form-control" placeholder="" aria-describedby="basic-addon5" required />
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Select Donor</label>
                                  <select class="form-control" name="donor_id" id="donor_id" required>
                                    <option value="">Select</option>
                                    @foreach($donar as $don)
                                    @if($don->email_id == $donation->email_id)
                                    <option selected data-donar="{{$don->donar}}" data-dob="{{$don->donar}}" data-company_name="{{$don->company_name}}" data-address="{{$don->address}}" data-mobile_no="{{$don->mobile_no}}" data-email_id="{{$don->email_id}}" data-pan_no="{{$don->pan_no}}" data-aadhar="{{$don->aadhar}}">{{$don->donar}}</option>
                                    @else
                                    <option data-donar="{{$don->donar}}" data-dob="{{$don->donar}}" data-company_name="{{$don->company_name}}" data-address="{{$don->address}}" data-mobile_no="{{$don->mobile_no}}" data-email_id="{{$don->email_id}}" data-pan_no="{{$don->pan_no}}" data-aadhar="{{$don->aadhar}}">{{$don->donar}}</option>
                                    @endif                                    
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Donar Name</label>
                                  <input type="text" name="donar" value="{{$donation->donar}}" id="donar" class="form-control" placeholder="Donar Name" aria-describedby="basic-addon5" maxlength="30"/>
                                </div>
                              </div>
                              <div class="col-md-3" id="date_of_birth">
                                <div class="form-group">
                                  <label>Date of Birth</label>
                                  <input type="date" name="dob" id="dob" value="{{$donation->dob}}" class="form-control" placeholder="" aria-describedby="basic-addon5"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Company Name</label>
                                  <input type="text" name="company_name" value="{{$donation->company_name}}" id="company_name" class="form-control" placeholder="Company Name" aria-describedby="basic-addon5" />
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" name="address" value="{{$donation->address}}" id="address" class="form-control" placeholder="Address" aria-describedby="basic-addon5" maxlength="150"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Phone</label>
                                  <input type="text" name="mobile_no" value="{{$donation->mobile_no}}" id="mobile_no" class="form-control" placeholder="Mobile No" aria-describedby="basic-addon5" maxlength="12"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Email Id</label>
                                  <input type="text" name="email_id" value="{{$donation->email_id}}" id="email_id" class="form-control" placeholder="Email Id" aria-describedby="basic-addon5" maxlength="50"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>PAN No</label>
                                  <input type="text" name="pan_no" value="{{$donation->pan_no}}" id="pan_no" class="form-control" placeholder="PAN No" aria-describedby="basic-addon5" maxlength="10"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Aadhar Number</label>
                                  <input type="text" name="aadhar" value="{{$donation->aadhar}}" id="aadhar" class="form-control" placeholder="Aadhar Number" aria-describedby="basic-addon5" maxlength="12"/>
                                </div>
                              </div>
                            </div>
                            <br>
                            <h3>Mode of Pyment</h3><br>
                            <div class="row">                              
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Payment Mode</label>
                                  <span id="selected_payment_mode" class="d-none">{{$donation->payment_mode}}</span>
                                  <select class="form-control" name="payment_mode" id="payment_mode" required>
                                    <!-- <option value="{{$donation->payment_mode}}"> -->{{$donation->payment_mode}}</option>
                                    <option>Cheque</option>
                                    <option>Online Transfer</option>
                                    <option>Cash</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3" id="name_of_person">
                                <div class="form-group">
                                  <label>Name of Person</label>
                                  <input type="text" name="payment_name" value="{{$donation->payment_name}}" class="form-control" placeholder="Name Of Person" aria-describedby="basic-addon5" maxlength="30"/>
                                </div>
                              </div>
                              <div class="col-md-3" id="issued_by">
                                <div class="form-group">
                                  <label>Issued By</label>
                                  <input type="text" name="issued_by" value="{{$donation->issued_by}}" class="form-control" placeholder="Issued By" aria-describedby="basic-addon5" maxlength="30"/>
                                </div>
                              </div>
                              <div class="col-md-3" id="beneficiary_name">
                                <div class="form-group">
                                  <label>Beneficiary Name</label>
                                  <input type="text" name="beneficiary_name" value="{{$donation->beneficiary_name}}" class="form-control" placeholder="Beneficiary Name" aria-describedby="basic-addon5" maxlength="30"/>
                                </div>
                              </div>
                              <div class="col-md-3" id="bank_name">
                                <div class="form-group">
                                  <label>Bank Name</label>
                                  <input type="text" name="bank" value="{{$donation->bank}}" class="form-control" placeholder="Bank Name" aria-describedby="basic-addon5" maxlength="30"/>
                                </div>
                              </div>                              
                              <div class="col-md-3" id="cheque_number">
                                <div class="form-group">
                                  <label>Cheque Number</label>
                                  <input type="text" name="cheque_number" value="{{$donation->cheque_number}}" class="form-control" placeholder="Cheque Number" aria-describedby="basic-addon5" maxlength="30"/>
                                </div>
                              </div>
                              <div class="col-md-3" id="cheque_date">
                                <div class="form-group">
                                  <label>Date</label>
                                  <input type="date" name="cheque_date" value="{{$donation->cheque_date}}" class="form-control" placeholder="Cheque Date" aria-describedby="basic-addon5" />
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Amount</label>
                                  <input type="text" name="amount" value="{{$donation->amount}}" class="form-control" placeholder="Amount" aria-describedby="basic-addon5" required />
                                </div>
                              </div>
                              <div class="col-md-3" id="cash_address">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" name="cash_address" value="{{$donation->cash_address}}" class="form-control" placeholder="Address" aria-describedby="basic-addon5" />
                                </div>
                              </div>                              
                              <div class="col-md-3" id="receipt_id">
                                <div class="form-group">
                                  <label>Receipt Id</label>
                                  <input type="text" name="receipt_id" value="{{$donation->receipt_id}}" class="form-control" placeholder="Receipt Id" aria-describedby="basic-addon5" maxlength="30"/>
                                </div>
                              </div>
                              <div class="col-md-3" id="transaction_id">
                                <div class="form-group">
                                  <label>Transaction Id</label>
                                  <input type="text" name="transaction_id" value="{{$donation->transaction_id}}" class="form-control" placeholder="Transaction Id" aria-describedby="basic-addon5" maxlength="30"/>
                                </div>
                              </div>
                            </div>
                            <br>
                            <h3>Reference</h3><br>
                            <div class="row">           
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Refrence</label>
                                  <input type="text" name="refrence" value="{{$donation->refrence}}" class="form-control" placeholder="Refrence" aria-describedby="basic-addon5" maxlength="30"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Comments</label>
                                  <input type="text" name="comment" value="{{$donation->comment}}" class="form-control" placeholder="Comments" aria-describedby="basic-addon5" maxlength="300"/>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <br>
                                  <button type="submit" class="btn btn-primary mt-2">Update</button>
                                </div>
                              </div>
                            </div>
                          </form>
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
    <script type="text/javascript">
      $( document ).ready(function() {
        var selected_payment_mode = $('#selected_payment_mode').html();
        $('#payment_mode').val(selected_payment_mode).change();
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

          $('#donor_id').change(function() {
            var donar = $(this).children('option:selected').data('donar');
            var dob = $(this).children('option:selected').data('dob');
            var company_name = $(this).children('option:selected').data('company_name');
            var address = $(this).children('option:selected').data('address');
            var mobile_no = $(this).children('option:selected').data('mobile_no');
            var email_id = $(this).children('option:selected').data('email_id');
            var pan_no = $(this).children('option:selected').data('pan_no');
            var aadhar = $(this).children('option:selected').data('aadhar');
            $("#donar").val(donar);
            $("#dob").val(dob);
            $("#company_name").val(company_name);
            $("#address").val(address);
            $("#mobile_no").val(mobile_no);
            $("#email_id").val(email_id);
            $("#pan_no").val(pan_no);
            $("#aadhar").val(aadhar);
          });
      });
    </script>
</body>
</html>//