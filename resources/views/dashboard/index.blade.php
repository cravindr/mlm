@extends('layouts.dashboard')

@section('pagecontent')
    <div class="row">
        <div class="offset-lg-9 col-lg-3 offset-md-9 col-md-3">
            <select id="yearsselected" name="yearsselected" class="form-control">
                <option value="current-year">Current Year</option>
                <option value="previous-year">Previous Year</option>
                <option value="current-month">Current Month</option>
                <option value="previous-month">Previous Month</option>
            </select>
        </div>
    </div>
    <div id="titlesdisplay"></div>
@endsection

@section('additional-js')
    <script>
        $(function () {
            var value = 'current-year';
            TilesLoad(value);
        });

       $('#titlesdisplay').on('click','.usercls',function () {
           var user = $(this).text();
           var selectedVal = $("#yearsselected option:selected").val();
           UserWiseRecords(user,selectedVal);
       });

       function UserWiseRecords(user,selectedVal){
           $.ajax({
               url : "{{ URL::to('/dashboard/usersrecords') }}",
               type: "POST",
               data: {user: user, year: selectedVal, "_token": "{{ csrf_token() }}"},
               success: function (data) {
                   var json = $.parseJSON(data);
                   console.log(json.details);
                   var html = '<div class="row">';
                   html += '<div class="col-sm-6 col-lg-3 col-md-3">'+
                       '            <div class="overview-item overview-item--c1">'+
                       '                <div class="overview__inner">'+
                       '                    <div class="overview-box clearfix">'+
                       '                        <div class="icon">'+
                       '                            <i class="zmdi zmdi-accounts"></i>'+
                       '                        </div>'+
                       '                        <div class="text">'+
                       '                            <span >'+json.year+'</span>'+
                       '                            <span >'+json.user+'&nbsp;Total Quote</span>'+
                       '                            <h2>'+json.total_records+'</h2>'+
                       '                        </div>'+
                       '                    </div>'+
                       '                    <div class="overview-chart">'+
                       '                        <canvas id="widgetChart1"></canvas>'+
                       '                    </div>'+
                       '                </div>'+
                       '            </div>'+
                       '        </div>';
                   html += '</div>';


                   var users = [];
                   html += '<div class="row">';
                   var months = ['Jan','Feb','March','April','May','June','July','Aug','Sept','Oct','Nov','Dec'];
                   $.each(json.details, function (i,v) {
                       if(i % 2 === 0) {
                           var myvar = '<div class="col-sm-6 col-lg-2 col-md-2">'+
                               '            <div class="overview-item overview-item--c2">'+
                               '                <div class="overview__inner">'+
                               '                    <div class="overview-box clearfix">'+
                               '                        <div class="icon">'+
                               '                            <i class="zmdi zmdi-view-day"></i>'+
                               '                        </div>'+
                               '                        <div class="text">'+
                               '                             <span class="link-span usercls">'+months[i]+'</span>'+
                               '                            <h2>'+v+'</h2>'+
                               '                        </div>'+
                               '                    <div class="overview-chart">'+
                               '                        <canvas id="widgetChart1"></canvas>'+
                               '                    </div>'+
                               '                    </div>'+
                               '                </div>'+
                               '            </div>'+
                               '        </div>';
                       } else {
                           var myvar = '<div class="col-sm-6 col-lg-2 col-md-2">'+
                               '            <div class="overview-item overview-item--c3">'+
                               '                <div class="overview__inner">'+
                               '                    <div class="overview-box clearfix">'+
                               '                        <div class="icon">'+
                               '                            <i class="zmdi zmdi-view-day"></i>'+
                               '                        </div>'+
                               '                        <div class="text clusers">'+
                               '                             <span class="link-span usercls">'+months[i]+'</span>'+
                               '                            <h2>'+v+'</h2>'+
                               '                        </div>'+
                               '                    <div class="overview-chart">'+
                               '                        <canvas id="widgetChart1"></canvas>'+
                               '                    </div>'+
                               '                    </div>'+
                               '                </div>'+
                               '            </div>'+
                               '        </div>';
                       }
                       html += myvar;

                   });
                   html += '</div>';
                   $('#titlesdisplay').html(html);
               }
           });
       }

       $('#yearsselected').on('change', function () {
           var value = $(this).val();
            TilesLoad(value);
       });

       function TilesLoad(value){
           $.ajax({
               url : "{{ URL::to('/dashboard/gettiles') }}",
               type: "POST",
               data: {res: value, "_token": "{{ csrf_token() }}"},
               success: function (data) {
                   var json = $.parseJSON(data);
                   var html = '<div class="row">';
                   html += '<div class="col-sm-6 col-lg-3 col-md-3">'+
                       '            <div class="overview-item overview-item--c1">'+
                       '                <div class="overview__inner">'+
                       '                    <div class="overview-box clearfix">'+
                       '                        <div class="icon">'+
                       '                            <i class="zmdi zmdi-accounts"></i>'+
                       '                        </div>'+
                       '                        <div class="text">'+
                       '                            <span >Total Quote</span>'+
                       '                            <h2>'+json.total_records+'</h2>'+
                       '                        </div>'+
                       '                    </div>'+
                       '                    <div class="overview-chart">'+
                       '                        <canvas id="widgetChart1"></canvas>'+
                       '                    </div>'+
                       '                </div>'+
                       '            </div>'+
                       '        </div>';
                   html += '</div>';


                   var users = [];
                   html += '<div class="row">';
                   $.each(json.details, function (i,v) {
                       if(i % 2 === 0) {
                           var myvar = '<div class="col-sm-6 col-lg-2 col-md-2">'+
                               '            <div class="overview-item overview-item--c2">'+
                               '                <div class="overview__inner">'+
                               '                    <div class="overview-box clearfix">'+
                               '                        <div class="icon">'+
                               '                            <i class="zmdi zmdi-account-o"></i>'+
                               '                        </div>'+
                               '                        <div class="text">'+
                               '                             <span class="link-span usercls">'+v.user+'</span>'+
                               '                            <h2>'+v.total+'</h2>'+
                               '                        </div>'+
                               '                    <div class="overview-chart">'+
                               '                        <canvas id="widgetChart1"></canvas>'+
                               '                    </div>'+
                               '                    </div>'+
                               '                </div>'+
                               '            </div>'+
                               '        </div>';
                       } else {
                           var myvar = '<div class="col-sm-6 col-lg-2 col-md-2">'+
                               '            <div class="overview-item overview-item--c3">'+
                               '                <div class="overview__inner">'+
                               '                    <div class="overview-box clearfix">'+
                               '                        <div class="icon">'+
                               '                            <i class="zmdi zmdi-account-o"></i>'+
                               '                        </div>'+
                               '                        <div class="text clusers">'+
                               '                            <span class="link-span usercls">'+v.user+'</span>'+
                               '                            <h2>'+v.total+'</h2>'+
                               '                        </div>'+
                               '                    <div class="overview-chart">'+
                               '                        <canvas id="widgetChart1"></canvas>'+
                               '                    </div>'+
                               '                    </div>'+
                               '                </div>'+
                               '            </div>'+
                               '        </div>';
                       }
                       html += myvar;

                   });
                   html += '</div>';
                   $('#titlesdisplay').html(html);

               }
           });
       }

    </script>
@endsection
