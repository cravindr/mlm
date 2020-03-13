<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Node</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">


                <form action="{{ URL::to('dashboard/node/updatesave') }}" method="post">
                @csrf
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="u_name"> Name </label>
                                    {{--<input type="text" name="u_id" id="u_id">--}}


                                    <input type="hidden" name="id" id="id">
                                    <input type="text" name="name" id="name"
                                           class=" form-control validate[required]"
                                           value="" placeholder="Enter Name"
                                           data-errormessage-value-missing="Name is required!">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="u_name">Father/Spouse</label>

                                    <input type="text" name="fname" id="fname" class="form-control validate[required]"
                                           value="" placeholder="Enter Father/Spouse Name"
                                           data-errormessage-value-missing="Father / Spouse  Name is required!">
                                </div>
                            </div>
                        </div>





                        <div class="form-group">
                            <label for="u_name">D.O.B</label>

                            <input type="date" name="dob" id="dob" class="form-control"
                                   value="" placeholder="Select D.O.B">
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <div class=card-header">Gender</div>

                                <div class="custom-control custom-radio custom-control-inline col-lg-3" >
                                    <input type="radio" value="male" class="validate[required] custom-control-input" id="gender_male" name="gender" data-errormessage-value-missing="Select Gender">
                                    <label class="custom-control-label" for="gender_male">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline col-lg-3" >
                                    <input type="radio" value="female" class="validate[required] custom-control-input" id="gender_female" name="gender" data-errormessage-value-missing="Select Gender">
                                    <label class="custom-control-label" for="gender_female">Female</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline col-lg-3" >
                                    <input type="radio" value="others" class="validate[required] custom-control-input" id="gender_others" name="gender" data-errormessage-value-missing="Select Gender">
                                    <label class="custom-control-label" for="gender_others">Transgender</label>
                                </div>
                            </div>
                        </div>






                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="u_name">Mobile Number</label>

                                    <input type="text" name="mobile" id="mobile" class="form-control validate[required]"
                                           value="" placeholder="Enter Mobile Number"
                                           data-errormessage-value-missing="Mobile Numer is required!"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="u_name">Email Id</label>

                                    <input type="text" name="email" id="email" class="form-control validate[custom[email]"
                                           value="" placeholder="Email"
                                           data-errormessage-value-missing="Email id is required!"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="u_name">Aadhar Number</label>
                                    <input type="hidden" id="checkaadhar" value="{{ URL::to('dashboard/node/aadharcheck') }}">
                                    <input type="text" name="aadhar" id="aadhar"
                                           class="validate[required,ajax[ajaxAadharCheck]] form-control"
                                           value="" placeholder="Enter Aadhar Number"
                                           data-errormessage-value-missing="Aadhar is required!">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="lpan">Pan Number</label>
                                    <input type="hidden" id="checkpan" value="{{ URL::to('dashboard/node/pancheck') }}">

                                    <input type="text" name="pan" id="pan" class="form-control validate[required,ajax[ajaxPanCheck]]"
                                           value="" placeholder="Enter PAN Number"
                                           data-errormessage-value-missing=" PAN is required!">
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="u_email">Address</label>
                            <textarea name="address" id="address" class="form-control"
                                      value="" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="u_email">Account Number</label>
                            <input type="text" name="accno" id="accno" class="form-control validate[required]"
                                   value="" placeholder="Enter Account Number"
                                   data-errormessage-value-missing="Account Numer is required!">
                        </div>
                        <div class="form-group">
                            <label for="u_email">IFSC Code</label>
                            <input type="text" name="ifsccode" id="ifsccode" class="form-control validate[required]"
                                   value="" placeholder="Enter IFSC Code"
                                   data-errormessage-value-missing="IFSC Code is required!">
                        </div>
                        <div class="form-group">
                            <label for="u_email">Bank Name</label>
                            <input type="text" name="bankname" id="bankname" class="form-control validate[required]"
                                   value="" placeholder="Enter Bank Name"
                                   data-errormessage-value-missing="Bank Name is required!">
                        </div>
                        <div class="form-group">
                            <label for="u_email">Branch Name</label>
                            <input type="text" name="branchname" id="branchname" class="form-control "
                                   value="" placeholder="Enter Branch Name"
                                   data-errormessage-value-missing="Branch Name is required!">
                        </div>
                        <div class="form-group">
                            <label for="u_email">Nominee Name</label>
                            <input type="text" name="nominee" id="nominee" class="form-control validate[required]"
                                   value="" placeholder="Enter Nominee Name"
                                   data-errormessage-value-missing="Nominee Name is required!">
                        </div>
                        <div class="form-group">
                            <label for="u_email">Relationship with Nominee </label>
                            <input type="text" name="relationship" id="relationship" class="form-control"
                                   value="" placeholder="Enter Relationship with Nominee">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary pull-right">Save</button>
                    </div>

                </form>


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
