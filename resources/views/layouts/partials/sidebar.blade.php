<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::user()->gender == 'female')
                    <img src="{{ asset('custom/img/avatar-women.png') }}" class="img-circle" alt="User Image">
                @else
                    <img src="{{ asset('custom/img/avatar-men.png') }}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            @if(Auth::user()->is_admin)
                <li class="header text-center">ADMIN</li>
            @elseif(Auth::user()->is_supervisor)
                <li class="header text-center">SUPERVISOR</li>
            @else
                <li class="header text-center">EMPLOYEE</li>
            @endif
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="/calendar"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
            <li><a href="/people"><i class="fa fa-user"></i> <span>People</span></a></li>
            <li><a href="/reports"><i class="fa fa-bar-chart"></i> <span>Reports</span></a></li>
            <li><a href="/teams"><i class="fa fa-group"></i> <span>Teams</span></a></li>
            @if(Auth::user()->is_admin)
            <li class="treeview">
                <a href="#"><i class="fa fa-check"></i> <span>Leave Management</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/type">Leave Types</a></li>
                    <li><a href="/balance">Leave Entitlements</a></li>
                    <li><a href="/application">Leave Applications</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-institution"></i> <span>Company Management</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/department">Department</a></li>
                    <li><a href="/position">Positions</a></li>
                    <li><a href="/user">Employees</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </section>
</aside>