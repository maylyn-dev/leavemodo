@extends('layouts.app')

@section('content')

    <div class="align-center banner">
        <img id="main-logo" class="img-responsive" src="{{ asset('custom/img/leavemodo-logo.png') }}">
        <h1 class="text-center app-name">Leavemodo</h1>
        <h5 class="text-center">"A user-friendly leave management application with a responsive design."</h5>
        <div class="link-btn"><a id="btn-login" href="/login" class="btn btn-lg bg-main btn-flat"><i class="fa fa-sign-in"></i> LOGIN</a></div>
    </div>
    <div class="clock"></div>

@endsection

@section('footer')

    <script>
        // Wait for window load
        $(window).load(function() {
            $(".clock").hide();
            $(".banner").show();
        });
//        $(document).ready(function() {
//            $(".clock").hide();
//            $(".banner").show();
//        });
    </script>

@endsection
