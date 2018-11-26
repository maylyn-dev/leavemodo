@extends('layouts.admin-template')

@section('content-header')
    <h4>New Leave Type</h4>
@endsection

@section('content')
<div class="box">
        <form role="form" method="post" action="{{ url('type') }}">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter leave type">
                    @if ($errors->has('name'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="Enter leave type description">
                    @if ($errors->has('description'))
                        <span class="help-block">
                           <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="min_years_service">Minimum Years of Service Required</label>
                    <input type="number" min="0" class="form-control" id="min_years_service" name="min_years_service" value="{{ old('min_years_service') }}" placeholder="Enter minimum years of service required">
                    @if ($errors->has('min_years_service'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('min_years_service') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="num_days">Initial Number of Days Alloted</label>
                    <input type="number" min="0" class="form-control" id="num_days" name="num_days" value="{{ old('num_days') }}" placeholder="Enter initial number of days alloted">
                    @if ($errors->has('num_days'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('num_days') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="max_days">Maximum Number of Days Allowed</label>
                    <input type="number" min="0" class="form-control" id="max_days" name="max_days" value="{{ old('max_days') }}" placeholder="Enter maximum number of days allowed">
                    @if ($errors->has('max_days'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('max_days') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="for_male">Is for Male</label>
                    <select id="for_male" class="form-control select2" name="for_male">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="for_female">Is for Female</label>
                    <select id="for_female" class="form-control select2" name="for_female">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="convert_to_cash">Is Convertible to Cash</label>
                    <select id="convert_to_cash" class="form-control select2" name="convert_to_cash">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="require_docs">Are Docs Required</label>
                    <select id="require_docs" class="form-control select2" name="require_docs">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="carry_over">Can be Carried Over</label>
                    <select id="carry_over" class="form-control select2" name="carry_over">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <button type="button" class="btn btn-default pull-left"><a href="/type">Back</a></button>
                <button type="submit" class="btn btn-primary pull-right">Add</button>
            </div><!-- /.box-body -->
        </form>
</div><!-- /.box -->
@endsection