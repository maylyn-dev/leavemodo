@extends('layouts.admin-template')

@section('content-header')
    <h4>User Profile</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    @if(Auth::user()->gender == 'female')
                        <img src="{{ asset('custom/img/avatar-women.png') }}" class="profile-user-img img-responsive img-circle" alt="User Image">
                    @else
                        <img src="{{ asset('custom/img/avatar-men.png') }}" class="profile-user-img img-responsive img-circle" alt="User Image">
                    @endif
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                    <p class="text-muted text-center">{{ Auth::user()->position->name }}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item text-center">
                            <i class="fa fa-institution"></i> <span class="text-center">{{ Auth::user()->department->name }}</span>
                        </li>
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#applications" data-toggle="tab">Leave Applications</a></li>
                    <li><a href="#balance" data-toggle="tab">Leave Balance</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="applications">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @if(count($applications) > 0)
                                <tbody>
                                @foreach($applications as $app)
                                    <tr>
                                        <td>{{ $app->type->name }}</td>
                                        <td>{{ $app->start_date->toFormattedDateString() }}, {{ $app->start_date->toTimeString() }}</td>
                                        <td>{{ $app->end_date->toFormattedDateString() }}, {{ $app->start_date->toTimeString() }}</td>
                                        <td><span class="label {{ $app->status->name == 'Pending' ? 'label-warning' : "" }} {{ $app->status->name == 'Forwarded' ? 'label-warning' : "" }} {{ $app->status->name == 'Denied' ? 'label-danger' : "" }}">{{ $app->status->name }}</span></td>
                                        <td><a href="">Details</a></td>
                                        @if($app->status->name == 'Pending' || $app->status->name == 'Forwarded')
                                            <td><a href="">Cancel</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <tbody>
                                <tr>
                                    <td>No leave applications found.</td>
                                </tr>
                                </tbody>
                            @endif
                        </table>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="balance">
                        <table id="balance-dt" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Leave Type</th>
                                <th>Leave Balance</th>
                                <th>Hours Consumed</th>
                                <th>Remaining Balance</th>
                            </tr>
                            </thead>
                            @if(count($balance) > 0)
                                <tbody>
                                @foreach($balance as $balance)
                                    <tr>
                                        <td>{{ $balance->type->name }}</td>
                                        <td>{{ $balance->type->num_days }}</td>
                                        <td>{{ $balance->consumed }}</td>
                                        <td>{{ $balance->remaining }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <tbody>
                                <tr>
                                    <td>You're not entitled to any leave benefit.</td>
                                </tr>
                                </tbody>
                            @endif
                        </table>
                    </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
            </div><!-- /.nav-tabs-custom -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('footer')
    <script>
        $(function () {
            $("#balance-dt").DataTable();
        });
    </script>
@endsection