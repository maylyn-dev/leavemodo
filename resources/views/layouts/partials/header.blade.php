<header class="main-header">
    <a href="/dashboard" class="logo">
        <span class="logo-mini"><i class="fa fa-clock-o"></i></span>
        <span class="logo-lg"><i class="fa fa-clock-o"></i> <b>Leavemodo</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li><a href="/application/create"><i class="fa fa-plus"></i> New Leave Request</a></li>
                <?php
                    if(Auth::user()->is_admin) {
                        $applications = \App\Application::where('status_id', 2)->latest()->get();
                    } elseif(Auth::user()->is_supervisor) {
                        $applications = \App\Application::where('status_id', 1)->latest()->get();
                    } else {
                        $applications = \App\Application::where('user_id', Auth::user()->id)
                                                            ->where(function($query) {
                                                                $query->orwhere('status_id', 3)
                                                                      ->orwhere('status_id', 4);
                                                            })->latest()->get();
                    }
                ?>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{ count($applications) }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{ count($applications) }} notifications</li>
                        @if(count($applications) > 0)
                            <li>
                                <ul class="menu">
                                    @foreach($applications as $app)
                                        <li>
                                            <a href="{{ url('/application/'.$app->id) }}">
                                                @if(Auth::user()->is_admin || Auth::user()->is_supervisor)
                                                    <i class="fa fa-user text-aqua"></i> {{ $app->user->name }} requested for {{ $app->type->name }}<br><em>{{ $app->updated_at->diffForHumans() }}</em>.
                                                @else
                                                    @if($app->status_id == 3)
                                                        <i class="fa fa-check text-success"></i> Your {{ $app->type->name }} application has been<br>approved. <em>{{ $app->updated_at->diffForHumans() }}</em>.
                                                    @elseif($app->status_id == 4)
                                                        <i class="fa fa-remove text-danger"></i> Your {{ $app->type->name }} application has been<br>denied. <em>{{ $app->updated_at->diffForHumans() }}</em>.
                                                    @endif
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        @endif
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->gender == 'female')
                            <img src="{{ asset('custom/img/avatar-women.png') }}" class="user-image" alt="User Image">
                        @else
                            <img src="{{ asset('custom/img/avatar-men.png') }}" class="user-image" alt="User Image">
                        @endif
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            @if(Auth::user()->gender == 'female')
                                <img src="{{ asset('custom/img/avatar-women.png') }}" class="img-circle" alt="User Image">
                            @else
                                <img src="{{ asset('custom/img/avatar-men.png') }}" class="img-circle" alt="User Image">
                            @endif
                            <p>
                                {{ Auth::user()->name }} - {{ Auth::user()->position->name }}
                                <small>Member since {{ Auth::user()->date_hired->toFormattedDateString() }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                {{--@if(Auth::user()->is_admin)--}}
                {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
                {{--@endif--}}
            </ul>
        </div>
    </nav>
</header>