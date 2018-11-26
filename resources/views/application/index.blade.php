@extends('layouts.admin-template')

@section('content-header')
    <h4>Leave Applications</h4>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="/application/create" style="cursor: pointer;"><i class="fa fa-plus"></i> Apply for a leave</a>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Employee</th>
                    <th>Leave Type</th>
                    <th>Date Applied</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
                </thead>
                @if(count($applications) > 0)
                    <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <td>{{ $application->user->name }}</td>
                            <td>{{ $application->type->name }}</td>
                            <td>{{ $application->date_applied->toFormattedDateString() }}</td>
                            <td>{{ $application->status->name }}</td>
                            <td><a href="{{ url('/application/'.$application->id) }}" style="cursor: pointer;">Details</a></td>
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
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection