<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('images/favicon.png') }}"
             alt="Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.users') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Users</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.orders')  }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Orders</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.tickets') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Tickets
                            @if(\App\Models\Ticket::where('status', "unread")->count() > 0)
                                <span class="right badge badge-danger">
                                    {{ \App\Models\Ticket::where('status', "unread")->count() }}
                                </span>
                            @endif
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>