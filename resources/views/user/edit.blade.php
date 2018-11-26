@extends('layouts.admin-template')

@section('content-header')
    <h4>Edit: {{ $user->name }}</h4>
@endsection

@section('content')
<div class="box">
        <form role="form" method="POST" action="{{ action('UsersController@update', $user->id) }}">
            {!! csrf_field() !!}
            {{ method_field('PATCH') }}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" class="form-control select2" name="gender">
                        <option value="male" {{ $user->gender == 'male' ? "selected" : "" }}>Male</option>
                        <option value="female" {{ $user->gender == 'female' ? "selected" : "" }}>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                    @if ($errors->has('address'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="contact_no">Contact No.</label>
                    <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{ $user->contact_no }}">
                    @if ($errors->has('contact_no'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('contact_no') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="birth_date">Date of Birth</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $user->birth_date }}">
                    @if ($errors->has('birth_date'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('birth_date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="civil_status">Civil Status</label>
                    <select id="civil_status" class="form-control select2" name="civil_status">
                        <option value="single" {{ $user->civil_status == 'single' ? "selected" : "" }}>Single</option>
                        <option value="married" {{ $user->civil_status == 'married' ? "selected" : "" }}>Married</option>
                        <option value="separated" {{ $user->civil_status == 'separated' ? "selected" : "" }}>Separated</option>
                        <option value="widowed" {{ $user->civil_status == 'widowed' ? "selected" : "" }}>Widowed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_hired">Date Hired</label>
                    <input type="date" class="form-control" id="date_hired" name="date_hired" value="{{ $user->date_hired }}">
                    @if ($errors->has('date_hired'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('date_hired') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="position_id">Position</label>
                    <select id="position_id" class="form-control select2" name="position_id">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" {{ $user->position_id == $position->id ? "selected" : "" }}>{{ $position->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_id">Department</label>
                    <select id="department_id" class="form-control select2" name="department_id">
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ $user->department_id == $department->id ? "selected" : "" }}>{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="is_admin">Is Admin</label>
                    <select id="is_admin" class="form-control select2" name="is_admin">
                        <option value="1" {{ $user->is_admin == 1 ? "selected" : "" }}>Yes</option>
                        <option value="0" {{ $user->is_admin == 0 ? "selected" : "" }}>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="is_supervisor">Is Supervisor</label>
                    <select id="is_supervisor" class="form-control select2" name="is_supervisor">
                        <option value="1" {{ $user->is_supervisor == 1 ? "selected" : "" }}>Yes</option>
                        <option value="0" {{ $user->is_supervisor == 0 ? "selected" : "" }}>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="admin_notes">Notes</label>
                    <input type="textarea" class="form-control" id="admin_notes" name="admin_notes" value="{{ $user->admin_notes }}">
                    @if ($errors->has('admin_notes'))
                        <span class="text-danger">
                           <strong>{{ $errors->first('admin_notes') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="button" class="btn btn-default pull-left"><a href="/user">Back</a></button>
                <button type="submit" class="btn btn-primary pull-right">Update</button>
            </div><!-- /.box-body -->
            </form>
    </div><!-- /.box -->
@endsection