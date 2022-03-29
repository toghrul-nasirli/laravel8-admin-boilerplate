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
                <li class="nav-item has-treeview {{ _isRequest('admin/users*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ _isRequest('admin/users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            @lang('admin.users')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ _isRoute('admin.users.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>@lang('admin.all-users')</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.create') }}" class="nav-link {{ _isRoute('admin.users.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>@lang('admin.add')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ _isRequest('admin/slider-elements*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ _isRequest('admin/slider-elements*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            @lang('admin.slider-elements')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.slider-elements.index') }}" class="nav-link {{ _isRoute('admin.slider-elements.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>@lang('admin.all-slider-elements')</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.slider-elements.create') }}" class="nav-link {{ _isRoute('admin.slider-elements.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>@lang('admin.add')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ _isRequest('admin/news*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ _isRequest('admin/news*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            @lang('admin.news')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.news.index') }}" class="nav-link {{ _isRoute('admin.news.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>@lang('admin.all-news')</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.news.create') }}" class="nav-link {{ _isRoute('admin.news.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>@lang('admin.add')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ _isRequest('admin/post*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ _isRequest('admin/post*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                            @lang('admin.posts')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.index') }}" class="nav-link {{ _isRoute('admin.posts.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>@lang('admin.all-posts')</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.post-categories.index') }}" class="nav-link {{ _isRoute('admin.post-categories.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>@lang('admin.categories')</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.create') }}" class="nav-link {{ _isRoute('admin.posts.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>@lang('admin.add')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ _isRequest('admin/socials*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ _isRequest('admin/socials*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-share-alt"></i>
                        <p>
                            @lang('admin.socials')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.socials.index') }}" class="nav-link {{ _isRoute('admin.socials.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-share-alt"></i>
                                <p>@lang('admin.all-socials')</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.socials.create') }}" class="nav-link {{ _isRoute('admin.socials.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>@lang('admin.add')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ _isRequest('admin/translations*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ _isRequest('admin/translations*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-language"></i>
                        <p>
                            @lang('admin.translates')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.translations.index', 'main') }}" class="nav-link {{ _isRequest('admin/translations/main*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>@lang('admin.homepage')</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.translations.index', 'about') }}" class="nav-link {{ _isRequest('admin/translations/about*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>@lang('admin.about')</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.translations.index', 'contact') }}" class="nav-link {{ _isRequest('admin/translations/contact*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-paper-plane"></i>
                                <p>@lang('admin.contact')</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>