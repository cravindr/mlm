@extends('layouts.dashboard')

@section('title', 'Coupon')

@section('pagecontent')
    {{--<div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3">
            <div class="card card-primary">
                <div class="card-header">
                    Coupon Generation
                </div>
                <div class="card-body">
                    <form action="{{ URL::to('dashboard/coupon/save') }}" method="post" id="newnode">
                        @csrf
                        <div class="form-group">
                            <label for="u_name">No of Coupons</label>
                            --}}{{--<input type="text" name="u_id" id="u_id">--}}{{--
                            <input type="hidden" id="checkaadhar" value="{{ URL::to('dashboard/node/aadharcheck') }}">
                            <input type="text" name="ncoupon" id="ncoupon" class="form-control validate[required]"
                                   value="" placeholder="Number of Coupons">
                        </div>
                        <div class="form-group">
                            <label for="u_name">Name</label>
                            --}}{{--<input type="text" name="u_id" id="u_id">--}}{{--
                            <input type="text" name="name" id="name"
                                   class="validate[required,ajax[ajaxAadharCheck]] form-control"
                                   value="" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="u_name">Father/Spouse</label>

                            <input type="text" name="fname" id="fname" class="form-control"
                                   value="" placeholder="Enter Father/Spouse Name">
                        </div>
                        <div class="form-group">
                            <label for="u_name">D.O.B</label>

                            <input type="date" name="dob" id="dob" class="form-control"
                                   value="" placeholder="Select D.O.B">
                        </div>
                        <div class="form-group">
                            <label for="u_name">Mobile Number</label>

                            <input type="text" name="mobile" id="mobile" class="form-control"
                                   value="" placeholder="Enter Mobile Number">
                        </div>

                        <div class="form-group">
                            <label for="u_name">Aadhar Number</label>

                            <input type="text" name="aadhar" id="aadhar" class="form-control"
                                   value="" placeholder="Enter Aadhar Number">
                        </div>
                        <div class="form-group">
                            <label for="lpan">Pan Number</label>

                            <input type="text" name="pan" id="pan" class="form-control"
                                   value="" placeholder="Enter PAN Number">
                        </div>

                        <div class="form-group">
                            <label for="u_email">Address</label>
                            <textarea name="address" id="address" class="form-control"
                                      value="" placeholder="Address"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="u_email">Account Number</label>
                            <input type="text" name="accno" id="accno" class="form-control"
                                   value="" placeholder="Enter Account Number">
                        </div>

                        <div class="form-group">
                            <label for="u_email">IFSC Code</label>
                            <input type="text" name="ifsccode" id="ifsccode" class="form-control"
                                   value="" placeholder="Enter IFSC Code">
                        </div>
                        <div class="form-group">
                            <label for="u_email">Bank Name</label>
                            <input type="text" name="bankname" id="bankname" class="form-control"
                                   value="" placeholder="Enter Bank Name">
                        </div>
                        <div class="form-group">
                            <label for="u_email">Branch Name</label>
                            <input type="text" name="branchname" id="branchname" class="form-control"
                                   value="" placeholder="Enter Branch Name">
                        </div>
                        <div class="form-group">
                            <label for="u_email">Nominee Name</label>
                            <input type="text" name="nominee" id="nominee" class="form-control"
                                   value="" placeholder="Enter Nominee Name">
                        </div>
                        <div class="form-group">
                            <label for="u_email">Relationship with Nominee Name</label>
                            <input type="text" name="relationship" id="relationship" class="form-control"
                                   value="" placeholder="Enter Nominee Name">
                        </div>
                        <div class="form-group">
                            <label for="u_email">Sponser Name</label>
                            <input type="text" name="sponsername" id="sponsername" class="form-control"
                                   value="" placeholder="Enter Sponser Name">
                        </div>

                        <div class="form-group">
                            <label for="u_email">Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                   value="" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="u_email">Mobile</label>
                            <input type="text" name="mobile" id="mobile" class="form-control"
                                   value="" placeholder="Enter Mobile Number">
                        </div>

                        <div class="form-group">
                            <label for="u_email">Comments</label>
                            <textarea name="comments" id="comments" class="form-control"
                                      value="" placeholder="Comments"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary pull-right">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>--}}

    <style>
        /* Tabs*/
        section {
            padding: 60px 0;
        }

        section .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 50px;
            text-transform: uppercase;
        }
        #tabs{
            background: #007b5e;
            color: #eee;
        }
        #tabs h6.section-title{
            color: #eee;
        }

        #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #f3f3f3;
            background-color: transparent;
            border-color: transparent transparent #f3f3f3;
            border-bottom: 4px solid !important;
            font-size: 20px;
            font-weight: bold;
        }
        #tabs .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            color: #eee;
            font-size: 20px;
        }
    </style>

    {{--<div class="row">
        <!-- Tabs -->
        <section id="tabs">
            <div class="container">
               <div class="col-lg-12">
                   <h6 class="section-title h1">Tabs</h6>
                   <div class="row">
                       <div class="col-md-12 col-lg-12 col-xs-12">

                       </div>
                   </div>
               </div>
            </div>
        </section>
        <!-- ./Tabs -->
    </div>--}}

    <div class="row">
        <div class="col-lg-12" id="tabs">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personal</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Bank Detail</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Coupon Detail</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
                </div>
            </nav>
            <form action="{{ URL::to('dashboard/coupon/save') }}" method="post" id="newnode">
                @csrf
                <div class="tab-content pt-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                  <div class="row">
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label for="u_name">Name</label>
                              {{--<input type="text" name="u_id" id="u_id">--}}
                              <input type="text" name="name" id="name"
                                     class="validate[required,ajax[ajaxAadharCheck]] form-control"
                                     value="" placeholder="Enter Name">
                          </div>
                          <div class="form-group">
                              <label for="u_name">Father/Spouse</label>

                              <input type="text" name="fname" id="fname" class="form-control"
                                     value="" placeholder="Enter Father/Spouse Name">
                          </div>
                          <div class="form-group">
                              <label for="u_name">D.O.B</label>

                              <input type="date" name="dob" id="dob" class="form-control"
                                     value="" placeholder="Select D.O.B">
                          </div>
                          <div class="form-group">
                              <label for="u_name">Mobile Number</label>

                              <input type="text" name="mobile" id="mobile" class="form-control"
                                     value="" placeholder="Enter Mobile Number">
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label for="u_name">Aadhar Number</label>

                              <input type="text" name="aadhar" id="aadhar" class="form-control"
                                     value="" placeholder="Enter Aadhar Number">
                          </div>
                          <div class="form-group">
                              <label for="lpan">Pan Number</label>

                              <input type="text" name="pan" id="pan" class="form-control"
                                     value="" placeholder="Enter PAN Number">
                          </div>

                          <div class="form-group">
                              <label for="u_email">Address</label>
                              <textarea name="address" id="address" class="form-control"
                                        value="" placeholder="Address"></textarea>
                          </div>
                      </div>
                  </div>

                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="u_email">Account Number</label>
                                <input type="text" name="accno" id="accno" class="form-control"
                                       value="" placeholder="Enter Account Number">
                            </div>

                            <div class="form-group">
                                <label for="u_email">IFSC Code</label>
                                <input type="text" name="ifsccode" id="ifsccode" class="form-control"
                                       value="" placeholder="Enter IFSC Code">
                            </div>
                            <div class="form-group">
                                <label for="u_email">Bank Name</label>
                                <input type="text" name="bankname" id="bankname" class="form-control"
                                       value="" placeholder="Enter Bank Name">
                            </div>
                            <div class="form-group">
                                <label for="u_email">Branch Name</label>
                                <input type="text" name="branchname" id="branchname" class="form-control"
                                       value="" placeholder="Enter Branch Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="u_email">Nominee Name</label>
                                <input type="text" name="nominee" id="nominee" class="form-control"
                                       value="" placeholder="Enter Nominee Name">
                            </div>
                            <div class="form-group">
                                <label for="u_email">Relationship with Nominee Name</label>
                                <input type="text" name="relationship" id="relationship" class="form-control"
                                       value="" placeholder="Enter Nominee Name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="u_email">Sponser Name</label>
                                <input type="text" name="sponsername" id="sponsername" class="form-control"
                                       value="" placeholder="Enter Sponser Name">
                            </div>

                            <div class="form-group">
                                <label for="u_email">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                       value="" placeholder="Enter Email">
                            </div>

                            <div class="form-group">
                                <label for="u_email">Mobile</label>
                                <input type="text" name="mobile" id="mobile" class="form-control"
                                       value="" placeholder="Enter Mobile Number">
                            </div>

                            <div class="form-group">
                                <label for="u_email">Comments</label>
                                <textarea name="comments" id="comments" class="form-control"
                                          value="" placeholder="Comments"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                    <div class="form-group">
                        <label for="u_name">Name</label>
                        {{--<input type="text" name="u_id" id="u_id">--}}
                        <input type="text" name="name" id="name"
                               class="validate[required,ajax[ajaxAadharCheck]] form-control"
                               value="" placeholder="Enter Name">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection

@section('datatables-scripts')
    <link rel="stylesheet" href="{{ asset('assets/vendor/validation-engine-master/css/validationEngine.jquery.css') }}">

    <script src="{{ asset('assets/vendor/validation-engine-master/js/languages/jquery.validationEngine-en.js') }}"></script>
    <script src="{{ asset('assets/vendor/validation-engine-master/js/jquery.validationEngine.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#newnode").validationEngine();

        });
    </script>
@endsection


