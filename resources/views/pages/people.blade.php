@extends('layouts.admin-template')

@section('content-header')
    <h4>People</h4>
@endsection

@section('content')
    @foreach($users as $user)
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                @if($user->gender == 'female')
                    <img src="{{ asset('custom/img/avatar-women.png') }}" class="profile-user-img img-responsive img-circle" alt="User Image">
                @else
                    <img src="{{ asset('custom/img/avatar-men.png') }}" class="profile-user-img img-responsive img-circle" alt="User Image">
                @endif
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                <p class="text-muted text-center">{{ $user->position->name }}</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item text-center">
                        <i class="fa fa-institution"></i> <span class="text-center">{{ $user->department->name }}</span>
                    </li>
                </ul>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    @endforeach
@endsection

@section('footer')

@endsection