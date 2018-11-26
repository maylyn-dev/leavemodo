@extends('layouts.admin-template')

@section('content-header')
    <h4>New Leave Application</h4>
@endsection

@section('content')
<div class="box">
        <form role="form" method="post" action="{{ url('application') }}">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="type_id">Leave Type</label>
                    <select id="type_id" class="form-control select2" name="type_id" data-placeholder="Select type of leave">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    @if ($errors->has('start_date'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('start_date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    @if ($errors->has('end_date'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="purpose">Purpose</label>
                    <input type="textarea" class="form-control" id="purpose" name="purpose" value="{{ old('purpose') }}">
                    @if ($errors->has('purpose'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('purpose') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="button" class="btn btn-default pull-left"><a href="/application">Cancel</a></button>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </div><!-- /.box-body -->
        </form>
</div><!-- /.box -->
@endsection