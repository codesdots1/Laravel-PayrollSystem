@extends('layouts.admin.main')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="">
                            <h4 class="card-title">All Salary List</h4>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Search</span>
                                </div>
                                <input id="emp" type="text" class="form-control" placeholder="Search by Employee ID or Email" aria-label="Username" aria-describedby="basic-addon1" onkeyup="return fiendAllSalaryData(this)">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend input-group-sm">
                                    <span class="input-group-text">Prepare Year</span>
                                </div>
                                <select class="form-control text-white" id="year" name="year" onchange="return fiendAllSalaryData(this)">
                                    @if($year)
                                        @foreach($year as $y)
                                            <option value="{{$y->sa_year}}" @if($y->sa_year == date('Y'))selected  @endif>{{$y->sa_year}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend input-group-sm">
                                    <span class="input-group-text">Prepare Month</span>
                                </div>
                                <select class="form-control text-white" id="month" name="month"  onchange="return fiendAllSalaryData(this)">
                                    @if($month)
                                        @foreach($month as $m)
                                            <option value="{{$m->sa_month}}" @if($m->sa_month == date('F',strtotime(now())))selected  @endif>{{$m->sa_month}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Department</span>
                                </div>
                                <select class="form-control text-white" id="dep" name="" onchange="return fiendAllSalaryData(this)">
                                    <option value="0">All</option>
                                    @if($department)
                                        @foreach($department as $dep)
                                            <option value="{{$dep->dep_id}}">{{$dep->dep_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-sm-12">
                        <div class="table-responsive" id="emp-table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Salary Month</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th title="Total Working Hour">Total W.Hour</th>
                                    <th>Amount</th>
                                    <th>Paid Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="salary-data">
                                @include('layouts.admin.payroll._last_salary_table')
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="col-sm-12 position">
                            @if(@$salary->links())
                                {{@$salary->links()}}
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop

