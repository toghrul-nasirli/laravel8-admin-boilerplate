<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar" style="overflow-x: hidden;">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/img/avatar.png') }}" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="{{ route('admin.users.index', _lang()) }}" class="d-block"><b>{{ auth()->user()->username }}</b></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-flat nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview {{ _isRequest('admin/users*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ _isRequest('admin/users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            İstifadəçilər
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index', _lang()) }}" class="nav-link {{ _isRoute('admin.users.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Bütün istifadəçilər</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.create', _lang()) }}" class="nav-link {{ _isRoute('admin.users.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Əlavə et</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ _isRequest('admin/socials*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ _isRequest('admin/socials*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-share-alt"></i>
                        <p>
                            Sosial şəbəkələr
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.socials.index', _lang()) }}" class="nav-link {{ _isRoute('admin.socials.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-share-alt"></i>
                                <p>Bütün sosial şəbəkələr</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.socials.create', _lang()) }}" class="nav-link {{ _isRoute('admin.socials.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Əlavə et</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ _isRequest('admin/translations*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ _isRequest('admin/translations*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-language"></i>
                        <p>
                            Tərcümələr
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.translations.index', ['lang' => _lang(), 'group' => 'main']) }}" class="nav-link {{ _isRequest('admin/translations/main*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Əsas səhifə</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.translations.index', ['lang' => _lang(), 'group' => 'about']) }}" class="nav-link {{ _isRequest('admin/translations/about*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Haqqımızda</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.translations.index', ['lang' => _lang(), 'group' => 'contact']) }}" class="nav-link {{ _isRequest('admin/translations/contact*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-paper-plane"></i>
                                <p>Əlaqə</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>