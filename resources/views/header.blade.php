<header class="p-3 mb-auto">
    <div class="container-fluid">
        <nav class="navbar navbar-dark" aria-label="Tenth navbar example">
            <div class="container-fluid position-relative">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar_header" aria-controls="navbar_header" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-row"></span>
                    <span class="navbar-toggler-row"></span>
                    <span class="navbar-toggler-row"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-md-center position-absolute" id="navbar_header">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('main') }}">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('about_the_contest') }}">О
                                конкурсе</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('how_to_become_a_member') }}">Как стать участником</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('prizes_for_winners') }}">Призы победителям</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('partners') }}">Партнеры</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news.index') }}">Новости</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('feedback') }}">Обратная связь</a>
                        </li>
                        <!--li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li-->
                    </ul>
                </div>

                <div class="navbar-brand">
                    @if (Auth::check())
                        <a class="navbar-item" href="{{ route('profile.card') }}">{{ __('Профиль') }}</a>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="navbar-item registration"
                               href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">{{ __('Выход') }}</a>
                        </form>
                    @else
                        <a class="navbar-item login" href="{{ route('login') }}">Вход</a>/<a class="navbar-item registration"
                                                                               href="{{ route('register') }}">регистрация</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>
