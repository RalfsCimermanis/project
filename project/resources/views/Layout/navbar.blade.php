
<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
    <div class="container">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side of navbar-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">@lang('messages.home')</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/results">@lang('messages.results')</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/games">@lang('messages.upcoming_games')</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/teams">@lang('messages.teams')</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@lang('messages.login')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang('messages.register')</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/games/create" class="dropdown-item">@lang('messages.add_game')</a>
                            <a href="/results/create" class="dropdown-item">@lang('messages.add_result')</a>
                            <a href="/home" class="dropdown-item" >@lang('messages.dashboard')</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                @lang('messages.logout')
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @lang('messages.language')
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/lang/lv">LV</a>
                            <a class="dropdown-item" href="/lang/en">EN</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>