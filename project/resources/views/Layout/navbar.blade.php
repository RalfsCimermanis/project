
<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
    <div class="container">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side of navbar-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Sākums</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/results">Rezultāti</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/games">Gaidāmās spēles</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/teams">Komandas</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/games/create" class="dropdown-item">Pievienot spēli</a>
                            <a href="/results/create" class="dropdown-item">Pievienot rezultātu</a>
                            <a href="/home" class="dropdown-item" >Panelis</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Iziet
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>