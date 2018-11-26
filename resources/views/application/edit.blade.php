@extends('layouts.admin-template')

@section('content-header')
    <h4>Edit: {{ $department->name }}</h4>
@endsection

@section('content')
<div class="box">
        <form role="form" method="POST" action="{{ action('DepartmentsController@update', $department->id) }}">
            {!! csrf_field() !!}
            {{ method_field('PATCH') }}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}" placeholder="">
                    @if ($errors->has('name'))
                        <span class="text-danger">
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
                <button type="button" class="btn btn-default pull-left"><a href="/department">Back</a></button>
                <button type="submit" class="btn btn-primary pull-right">Update</button>
            </div><!-- /.box-body -->
            </form>
    </div><!-- /.box -->
@endsection