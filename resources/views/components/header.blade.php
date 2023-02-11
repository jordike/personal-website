<header>
    <nav id="#navbar" class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route("home") }}">Jordi Keijzers</a>

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
                        <a class="nav-link" href="{{ route("home") }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("projects.index") }}">Projecten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("experience.index") }}">Ervaring</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("cv") }}">CV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("contact") }}">Contact</a>
                    </li>
                    @if (auth()->check() && auth()->user()->isAdministrator())
                        <li class="dropdown">
                            <button class="btn btn-link nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                Beheer
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item nav-link" href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                                <li><a class="dropdown-item nav-link" href="{{ route("admin.create-account") }}">Account aanmaken</a></li>
                                <li><a class="dropdown-item nav-link" href="{{ route("admin.view-accounts") }}">Accountoverzicht</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button id="theme-toggle" class="nav-link" onclick="toggleTheme()">
                            <i id="theme-toggle-icon" class="fa-solid fa-moon"></i>
                        </button>
                    </li>
                    @auth
                        <li class="dropdown">
                            <button class="dropdown-toggle btn btn-link nav-item nav-link" data-bs-toggle="dropdown">
                                {{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item nav-link" href="{{ route("profile") }}">Mijn profiel</a></li>
                                <li><a class="dropdown-item nav-link" href="{{ route("logout") }}">Uitloggen</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("login") }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
