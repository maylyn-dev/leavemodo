@extends('layouts.admin-template')

@section('content-header')
    <h4>Edit: Leave Balance of {{ $balance->user->name }}</h4>
@endsection

@section('content')
<div class="box">
        <form role="form" method="POST" action="{{ action('BalancesController@update', $balance->id) }}">
            {!! csrf_field() !!}
            {{ method_field('PATCH') }}
            <div class="box-body">
                <div class="form-group">
                    <label for="fiscal_year">Fiscal Year</label>
                    <input type="date" class="form-control" id="fiscal_year" name="fiscal_year" value="{{ $balance->fiscal_year }}">
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
                <button type="submit" class="btn btn-primary pull-right">Update</button>
            </div><!-- /.box-body -->
            </form>
    </div><!-- /.box -->
@endsection