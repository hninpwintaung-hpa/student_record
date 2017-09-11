@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-sm-3 col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
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
                                    <li class="list-group-item"><a href="{{route('batch',['id'=>$ctime->id])}}">{{$ctime->batch}} </a> <span class="badge">{{date('d-m-Y', strtotime($ctime->start_date))}}</span></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>


            </div>
        </div>





    <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/home">Students</a><small><a class="pull-right" href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign"></span> Add Student</a></small></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Students List
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Course Fees</th>
                                        <th>Student Payment</th>
                                        <th>To Fees</th>
                                    </tr>
                                        @foreach($students as $st)
                                            <tr>
                                                <td>{{$st->id}}</td>
                                                <td>{{$st->studentName}}</td>
                                                <td>{{$st->course->course_name}}</td>
                                                <td>{{$st->course->course_fees}}</td>
                                                <td>{{$st->student_payment}}
                                                    <div class="dropdown">
                                                        <button class="btn btn-xs btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                                                            <span class="caret"></span>
                                                        </button>
                                                        @if($st->course->course_fees - $st->student_payment == '0')

                                                        @else

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
                                                            @endif
                                                    </div>
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
                        <div class="col-sm-4">
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
                                                <td>{{$tr->course_name}}</td>
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
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Student</h4>
            </div>
            <div id="successInfo"></div>
            <div class="modal-body">
                <div class="form-group">
                <label for="studentName" class="control-label"> Student Name</label>
                <input type="text" name="studentName" id="studentName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="payment" class="control-label">Student Payment</label>
                    <input type="text" name="payment" id="payment" class="form-control">
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
                <button type="button"  id="btnNew" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>

@endsection

