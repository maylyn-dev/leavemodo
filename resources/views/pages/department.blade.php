@extends('layouts.admin-template')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Departments</h3>
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#createDepartmentModal">Add New</button>
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
                            <td><a data-toggle="modal" data-target="#editDepartmentModal" style="cursor: pointer;"><i class="fa fa-edit"></i></a></td>
                            <td><i class="fa fa-remove"></i></td>
                        </tr>
                    @endforeach
                    </tbody>
                @endif
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-- Add Department Modal -->
    <div id="createDepartmentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Department</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{ url('department') }}">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name of department">
                                @if ($errors->has('name'))
                                    <span class="help-block text-danger">
                                   <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="Enter description for department">
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                   <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div><!-- /.box-body -->
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary pull-right" >Add</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>

            </div><!-- /.modal-content -->
        </div>
    </div>

    <!-- Edit Department Modal -->
    <div id="editDepartmentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit: {{ $department->name }}</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="PATCH" action="{{ action('DepartmentsController@update', $department->id) }}">
                        <input name="_method" type="hidden" value="PATCH">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}" placeholder="">
                                @if ($errors->has('name'))
                                    <span class="help-block text-danger">
                                   <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ $department->description }}" placeholder="">
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                   <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div><!-- /.box-body -->
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>

            </div><!-- /.modal-content -->
        </div>
    </div>

@endsection