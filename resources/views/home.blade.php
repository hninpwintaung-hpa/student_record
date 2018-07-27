@extends('layouts.app')

@section('content')

    <div class="row" style="margin-top: 70px">
        <div class="container">

    <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/home">
                        ေက်ာင္းသားစုစုေပါင္း <span class="badge">{{count($students)}}</span>
                    </a><small><a class="pull-right" href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign"></span> ေက်ာင္းသားအသစ္တိုးရန္</a></small></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Students List
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover" id="recordTable">
                                        <thead>
                                    <tr style="background: grey; color: #fff">
                                        <th>နံပတ္စဥ္</th>
                                        <th>အမည္</th>
                                        <th>အမွတ္စဥ္</th>
                                        <th>သင္တန္းသင္ရိုး</th>
                                        <th>သင္တန္းေၾကး</th>
                                        <th>ေပးၿပီး</th>
                                        <th>ေပးရန္က်န္ရွိ</th>
                                    </tr>
                                        </thead>
                                        @foreach($students as $st)
                                            <tr>
                                                <td>{{$st->id}}</td>
                                                <td>{{$st->studentName}}</td>
                                                <td>{{$st->ctime->batch}}</td>
                                                <td>{{$st->course->course_name}}</td>
                                                <td>{{$st->course->course_fees}}</td>
                                                <td><span class="pull-left">{{$st->student_payment}}</span>

                                                        @if($st->course->course_fees - $st->student_payment != '0')
                                                        <div class="dropdown">
                                                            <button class="btn btn-xs btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                <span class="caret"></span>
                                                            </button>

                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                            <li>
                                                                <form method="post" action="{{route('student_update')}}">
                                                                    <input type="hidden" name="id" id="id" value="{{$st->id}}">
                                                                    <input type="number" class="form-control" name="payment" id="payment" placeholder="Payment">
                                                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Save</button>
                                                                    {{csrf_field()}}
                                                                </form>
                                                            </li>
                                                        </ul>
                                                        </div>
                                                        @endif

                                                </td>
                                                <td>@if($st->course->course_fees - $st->student_payment == '0')
                                                        Finish Payment
                                                        @else
                                                        {{$st->course->course_fees - $st->student_payment}}
                                                        @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-bookmark">
                            </span> Course Period</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list-group">
                                                @foreach($ctimes as $ctime)
                                                    <li class="list-group-item"><a href="{{route('batch',['name'=>$ctime->batch])}}">{{$ctime->batch}} </a> <span class="badge">{{date('d-m-Y', strtotime($ctime->start_date))}}</span></li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="panel panel-primary">
                                <div class="panel-heading">Training Courses</div>
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <th>Course Name</th>
                                            <th>Fees</th>
                                        </tr>
                                        @foreach($courses as $tr)
                                            <tr>
                                                <td><a href="{{route('by.course',['course'=>$tr->course_name])}}">{{$tr->course_name}}</a></td>
                                                <td>{{$tr->course_fees}}</td>
                                            </tr>
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div id="successInfo"></div>
        <form id="newStudentForm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Student</h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                <label for="studentName" class="control-label"> Student Name</label>
                <input type="text" name="studentName" id="studentName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="student_payment" class="control-label">Student Payment</label>
                    <input type="text" name="student_payment" id="student_payment" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ctime_id" class="control-label">Batch</label>
                    <select name="ctime_id" id="ctime_id" class="form-control">

                        @foreach($ctimes as $ct)
                            <option value="{{$ct->id}}">{{$ct->batch}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="course_id" class="control-label">Course Name</label>
                    <select name="course_id" id="course_id" class="form-control">
                        <option value="">--Select Course--</option>
                        @foreach($courses as $cu)
                            <option value="{{$cu->id}}">{{$cu->course_name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        </div>
    </div>
    </div>

@endsection

