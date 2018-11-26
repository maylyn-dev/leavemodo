@extends('layouts.admin-template')

@section('content-header')
    <h4>New Position</h4>
@endsection

@section('content')
<div class="box">
        <form role="form" method="post" action="{{ url('position') }}">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter position">
                    @if ($errors->has('name'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="Enter description of position">
                    @if ($errors->has('description'))
                        <span class="help-block">
                           <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="button" class="btn btn-default pull-left"><a href="/department">Back</a></button>
                <button type="submit" class="btn btn-primary pull-right">Add</button>
            </div><!-- /.box-body -->
        </form>
</div><!-- /.box -->
@endsection