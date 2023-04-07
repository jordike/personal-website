@php
    function handleActiveRoute($route) {
        $isActive = strpos(Route::currentRouteName(), $route) === 0;

        if ($isActive) {
            return "active";
        }
    }
@endphp
<header>
    <nav id="#navbar" class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route("home", [], false) }}">Jordi Keijzers</a>

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                <svg id="navbar-toggler-icon">
                    <line x1="33%" y1="50%" x2="67%" y2="50%" />
                    <line x1="33%" y1="50%" x2="67%" y2="50%" />
                    <line x1="33%" y1="50%" x2="67%" y2="50%" />
                </svg>
            </button>

            <div class="navbar-collapse collapse justify-content-between">
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link {{ handleActiveRoute("home") }}" href="{{ route("home", [], false) }}">
                            {{ __("components/header.navbar.home") }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ handleActiveRoute("projects.index") }}" href="{{ route("projects.index", [], false) }}">
                            {{ __("components/header.navbar.projects") }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ handleActiveRoute("experience.index") }}" href="{{ route("experience.index", [], false) }}">
                            {{ __("components/header.navbar.experience") }}
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ handleActiveRoute("cv") }}" href="{{ route("cv") }}">
                            {{ __("components/header.navbar.cv") }}
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ handleActiveRoute("contact") }}" href="{{ route("contact", [], false) }}">
                            {{ __("components/header.navbar.contact") }}
                        </a>
                    </li>
                    @if (auth()->check() && auth()->user()->isAdministrator())
                        <li class="dropdown">
                            <button class="btn btn-link nav-item nav-link dropdown-toggle nav-dropdown-toggle" data-bs-toggle="dropdown">
                                {{ __("components/header.admin.toggle") }}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link {{ handleActiveRoute("admin.dashboard") }}" href="{{ route("admin.dashboard", [], false) }}">
                                        {{ __("components/header.admin.dashboard") }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link {{ handleActiveRoute("admin.users.index") }}" href="{{ route("admin.users.index", [], false) }}">
                                        {{ __("components/header.admin.account-overview") }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <ul class="navbar-nav">
                    {{-- <li class="nav-item">
                        <button id="theme-toggle" class="nav-link" onclick="toggleTheme()">
                            <i id="theme-toggle-icon" class="fa-solid fa-moon"></i>
                        </button>
                    </li> --}}
                    <li class="dropdown">
                        <button class="dropdown-toggle btn btn-link nav-item nav-link nav-dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-language"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a class="nav-link @if (app()->getLocale() == "nl") active @endif" href="{{ route("locale", "nl", false) }}">
                                    Nederlands
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <a class="nav-link @if (app()->getLocale() == "en") active @endif" href="{{ route("locale", "en", false) }}">
                                    English
                                </a>
                            </li>
                        </ul>
                    </li>
                    @auth
                        <li class="dropdown">
                            <button class="dropdown-toggle btn btn-link nav-item nav-link nav-dropdown-toggle" data-bs-toggle="dropdown">
                                {{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link {{ handleActiveRoute("profile") }}" href="{{ route("profile", [], false) }}">
                                        {{ __("components/header.profile.my-profile") }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-link" href="{{ route("logout", [], false) }}">
                                        {{ __("components/header.profile.logout") }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ handleActiveRoute("login") }}" href="{{ route("login", [], false) }}">
                                {{ __("components/header.login") }}
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
