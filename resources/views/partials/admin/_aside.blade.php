<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar" style="overflow-x: hidden;">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/img/avatar.png') }}" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="{{ route('admin.users.index') }}" class="d-block"><b>{{ auth()->user()->username }}</b></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-flat nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            İstifadəçilər
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ currentRoute('admin.users.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Bütün istifadəçilər</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.create') }}" class="nav-link {{ currentRoute('admin.users.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Əlavə et</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item has-treeview {{ request()->is('admin/socials*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/socials*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-share-square"></i>
                        <p>
                            Sosial şəbəkələr
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.socials.index') }}" class="nav-link {{ currentRoute('admin.socials.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-share-square"></i>
                                <p>Bütün sosial şəbəkələr</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.socials.create') }}" class="nav-link {{ currentRoute('admin.socials.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Əlavə et</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
    </div>
</aside>