@extends('layouts.admin-template')

@section('content-header')
    <h4>Employees</h4>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="/user/create" style="cursor: pointer;"><i class="fa fa-plus"></i> Add New</a>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                @if(count($users) > 0)
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->position->name }}</td>
                            <td>{{ $user->department->name }}</td>
                            <td><a href="{{ url('/user/'.$user->id.'/edit') }}" style="cursor: pointer;"><i class="fa fa-edit"></i></a></td>
                            <td>
                                <form action="{{ url('user/'.$user->id) }}" method="POST">
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