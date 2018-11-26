@extends('layouts.admin-template')

@section('content-header')
    <h4>Leave Balance</h4>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h5>Employee: <strong>{{ $balance->user->name }}</strong></h5>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Leave Type</th>
                    <th>Leave Balance</th>
                    <th>Hours Consumed</th>
                    <th>Remaining Balance</th>
                </tr>
                </thead>
                @if(count($balance->types) > 0)
                    <tbody>
                    @foreach($balance->types as $type)
                        <tr>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->num_days }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <tbody>
                    <tr>
                        <td>There's no entitled leave for this employee.</td>
                    </tr>
                    </tbody>
                @endif
            </table>
            <button type="button" class="btn btn-default pull-left"><a href="/balance">Back</a></button>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection