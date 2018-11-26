@extends('layouts.admin-template')

@section('content-header')
    <h4>New Leave Balance</h4>
@endsection

@section('content')
<div class="box">
        <form role="form" method="post" action="{{ url('balance') }}">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="user_id">Employee</label>
                    <select id="user_id" class="form-control select2" name="user_id" data-placeholder="Select an employee">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fiscal_year">Fiscal Year</label>
                    <input type="date" class="form-control" id="fiscal_year" name="fiscal_year" value="{{ date('Y-m-d') }}">
                    @if ($errors->has('fiscal_year'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('fiscal_year') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="type_list">Leave Types</label>
                    <select id="type_list" class="form-control select2" name="type_list[]" multiple="multiple" data-placeholder="Select leave types">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-default pull-left"><a href="/balance">Back</a></button>
                <button type="submit" class="btn btn-primary pull-right">Add</button>
            </div><!-- /.box-body -->
        </form>
</div><!-- /.box -->
@endsection