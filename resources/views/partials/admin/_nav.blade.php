<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="dropdown">
                <div class="nav-link user-select-none dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-expanded="false">
                    {{ app()->getLocale() }}
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                    @foreach (config('app.all_locales') as $locale)
                    @if (app()->getLocale() == $locale) @continue @endif
                    <button class="dropdown-item" type="button">{{ $locale }}</button>
                    @endforeach
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link {{ currentRoute('admin.settings') ? 'bg-secondary rounded-lg' : '' }}">
                <i class="fas fa-cog"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>