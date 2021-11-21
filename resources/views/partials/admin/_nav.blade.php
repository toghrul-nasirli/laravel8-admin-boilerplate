<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="dropdown">
                @if(count($locales) > 1)
                <div class="nav-link user-select-none dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-expanded="false">
                    {{ lang() }}
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                    @foreach ($locales as $locale)
                    @if (lang() == $locale->key) @continue @endif
                    <a href="{{ route(currentRoute(), array_merge(currentRouteParameters(), ['lang' => $locale->key])) }}" class="dropdown-item">{{ $locale->key }}</a>
                    @endforeach
                </div>
                @endif
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.settings', lang()) }}" class="nav-link {{ isRoute('admin.settings') ? 'bg-secondary rounded-lg' : '' }}">
                <i class="fas fa-cog"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout', lang()) }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
            </a>
            <form id="logout-form" action="{{ route('logout', lang()) }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>