@extends('layouts.admin-template')

@section('content-header')
    <h4>Departments</h4>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="/department/create" style="cursor: pointer;"><i class="fa fa-plus"></i> Add New</a>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                @if(count($departments) > 0)
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->description }}</td>
                            <td><a href="{{ url('/department/'.$department->id.'/edit') }}" style="cursor: pointer;"><i class="fa fa-edit"></i></a></td>
                            <td>
                                <form action="{{ url('department/'.$department->id) }}" method="POST">
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