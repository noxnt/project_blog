<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
{{--            <div class="image">--}}
{{--                <img src="" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
            <div class="info">
                <a href="#" class="d-block text-uppercase pl-3">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">TABLES</li>
                <li class="nav-item">
                    <a href="{{ route('admin.post.index') }}" class="nav-link">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>Posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <li class="nav-item" >
                    <a href="{{ route('admin.tag.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Tags</p>
                    </a>
                </li>

{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-user-friends"></i>--}}
{{--                        <p>Users</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-header">LOGS</li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-cogs"></i>--}}
{{--                        <p>Blog logs</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
