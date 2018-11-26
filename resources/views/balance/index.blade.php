@extends('layouts.admin-template')

@section('content-header')
    <h4>Leave Balances</h4>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="/balance/create" style="cursor: pointer;"><i class="fa fa-plus"></i> Add New</a>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Employee</th>
                    <th>Fiscal Year</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                @if(count($balances) > 0)
                    <tbody>
                    @foreach($balances as $balance)
                        <tr>
                            <td><a href="{{ url('balance/'.$balance->id) }}">{{ $balance->user->name }}</a></td>
                            <td>{{ $balance->fiscal_year->year }}</td>
                            <td><a href="{{ url('/balance/'.$balance->id.'/edit') }}" style="cursor: pointer;"><i class="fa fa-edit"></i></a></td>
                            <td>
                                <form action="{{ url('balance/'.$balance->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button style="color:#dd4b39;background: none;padding:0;margin:0;" class="btn btn-sm"><i class="fa fa-remove"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <tbody>
                        <tr>
                            <td>No records found.</td>
                        </tr>
                    </tbody>
                @endif
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection