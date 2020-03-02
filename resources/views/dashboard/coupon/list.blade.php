@extends('layouts.dashboard')

@section('title', 'Coupon Allotment')

@section('pagecontent')
    <div class="row mb-2">
        <div class="col-lg-1">
            <a href="{{ URL::to('/dashboard/coupon') }}"  class="btn btn-outline-primary"

                    >Create Coupon
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <div class="table-responsive table-responsive-data2">
                <table id="coupontable" width="100%" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Ord.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Coupon Code</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th width="2%">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
@endsection

@section('datatables-scripts')
    <link rel="stylesheet" href="{{ asset('assets/vendor/validation-engine-master/css/validationEngine.jquery.css') }}">
    @include('dashboard.users.new_users')
    <script src="{{ asset('assets/vendor/validation-engine-master/js/languages/jquery.validationEngine-en.js') }}"></script>
    <script src="{{ asset('assets/vendor/validation-engine-master/js/jquery.validationEngine.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#pass-update").validationEngine();
            var table = $('#coupontable').DataTable({
                "order": [[ 0, "desc" ]],
                "processing": true,
                "serverSide": true,
                ajax: '{{ URL::to('/dashboard/couponserverside') }}',
                columns: [
                    { data: 'id' },
                    { data: 'gen_id' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'mobile' },
                    { data: 'coupon_code' },
                    { data: 'c_date' },
                    {
                        data: 'status',
                        targets:7,
                        render: function ( data, type, row, meta ) {
                           /* if(data=='active'){
                                return '<a href="'+data+'">active</a>';
                            }
                            else
                            {
                                return '<a href="'+data+'">Inactive</a>';
                            }*/

                            var color = ' badge badge-';
                            if(data == 'active') {
                                color += 'success';
                            }
                             else if(data =='inactive') {
                                color += 'danger';
                            }
                            else  {
                                color += 'warning';
                            }

                           // return '<button class="'+color+'">'+data+'</button>';
                            return '<span style="cursor: pointer" id="btn-status" class="'+color+'">'+data+'</span>';
                        }

                    },
                    {
                        targets: 8,
                        data: null,
                        defaultContent: '<button id="btnedit" title="Edit" type="button" class="btn btn-primary btn-sm">' +
                            '<i class="fa fa-edit" aria-hidden="true"></i></button>&nbsp;&nbsp;' +
                            '<button id="btndelete" type="button" title="Delete" class="btn btn-danger btn-sm">' +
                            '<i class="fa fa-trash" aria-hidden="true"></i>' +
                            '</button>'
                    }
                ]
            });

            $('#coupontable tbody').on( 'click', '#btnedit', function () {
                var data = table.row($(this).parents('tr')).data();
                if(data.status=='active'|| data.status=='inactive')
                Edit(data.id);
            } );

            $('#coupontable tbody').on( 'click', '#btn-status', function () {
                var data = table.row($(this).parents('tr')).data();
                //alert(data.coupon_code);
                if(data.status=='active')
                {

                    var con = confirm('Do you want to deactivate this coupon : ' + data.coupon_code + " ?");

                    if(con == true){

                        $.ajax({
                            url: "{{ URL::to('dashboard/coupon/deactivate') }}",
                            type: "POST",
                            data: {id: data.id, "_token": "{{ csrf_token() }}"},
                            success: function (data) {
                                window.location.reload();
                            }
                        });
                    }

                }

                if(data.status=='inactive')
                {
                     var con = confirm('Do you want to Activate this coupon : ' + data.coupon_code + " ?");
                    if(con == true){

                        $.ajax({
                            url: "{{ URL::to('dashboard/coupon/activate') }}",
                            type: "POST",
                            data: {id: data.id, "_token": "{{ csrf_token() }}"},
                            success: function (data) {
                                window.location.reload();
                            }
                        });
                    }


                }


            } );

            $('#coupontable tbody').on( 'click', '#btndelete', function () {
                var data = table.row($(this).parents('tr')).data();
                if(data.status=='active'|| data.status=='inactive')
                Delete(data.id,data.name,data.coupon_code);
            } );
        });

        function Edit(id) {

            $.ajax({
                url: "{{ URL::to('/dashboard/coupon/couponedit') }}",
                type: "POST",
                data: {id: id, "_token": "{{ csrf_token() }}"},
                success: function (data) {
                    var json = $.parseJSON(data);

                    $('#id').val(json.id);
                    $('#name').val(json.name);
                    $('#email').val(json.email);
                    $('#mobile').val(json.mobile);
                    $('#comments').val(json.comments);
                    $('#myModal').modal('show');
                }
            });
        }

        function Delete(id,name,coupon) {
            var con = confirm('Are you want Delete ' + name +"'s coupon "+coupon+" ?");
            if(con == true){
                $.ajax({
                    url: "{{ URL::to('dashboard/coupon/delete') }}",
                    type: "POST",
                    data: {id: id, "_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        window.location.reload();
                    }
                });
            }
        }
    </script>
@endsection

@include('dashboard.coupon.modal')
