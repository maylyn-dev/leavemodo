@extends('layouts.admin-template')

@section('content-header')
    <h4>Dashboard</h4>
@endsection

@section('content')
    <div class="box">
        @if(Auth::user()->is_admin || Auth::user()->is_supervisor)
        <div class="box-header">
            <h3 class="box-title">Pending Requests</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            @if (count($applications) > 0)
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Leave Type</th>
                        <th>Date</th>
                        <th>Applied</th>
                        <th>Status</th>
                        <th>Reason</th>
                        <th>Details</th>
                        <th>Approve</th>
                        <th>Deny</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $app)
                    <tr>
                        <td>{{ $app->user->name }}</td>
                        <td>{{ $app->type->name }}</td>
                        <td>{{ $app->start_date->toFormattedDateString() }} - {{ $app->end_date->toFormattedDateString() }}</td>
                        <td><em>{{ $app->created_at->diffForHumans() }}</em></td>
                        <td><span class="label {{ $app->status->name == 'Pending' ? 'label-warning' : "" }} {{ $app->status->name == 'Forwarded' ? 'label-warning' : "" }}">{{ $app->status->name }}</span></td>
                        <td>{{ $app->purpose }}</td>
                        <td><a href="">See more</a></td>
                        <td>
                            @if(Auth::user()->is_supervisor)
                                <a class="text-success" href="{{ url('/application/'.$app->id).'/forward' }}"><i class="fa fa-check"></i></a>
                            @elseif(Auth::user()->is_admin)
                                <a class="text-success" href="{{ url('/application/'.$app->id).'/approve' }}"><i class="fa fa-check"></i></a>
                            @endif
                        </td>
                        <td><a class="text-danger" href="{{ url('/application/'.$app->id).'/deny' }}"><i class="fa fa-remove"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p style="margin:10px;" class="text-info">No pending request.</p>
            @endif
        </div><!-- /.box-body -->
        @else
        <div class="box-header">
            <h3 class="box-title">Recent Activity</h3>
        </div>
        @endif
    </div><!-- /.box -->
@endsection