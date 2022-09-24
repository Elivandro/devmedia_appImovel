<section>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container container-fluid">
            <a href="{{ route('page.index') }}" class="navbar-brand active" aria-current="page">Ínicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('page.filter', 'Apartamento') }}">Apartamentos</a>
                    <a class="nav-link" href="{{ route('page.filter', 'Casa') }}">Casas</a>
                    <a class="nav-link" href="{{ route('page.filter', 'Kitnet') }}">Kitnets</a>
                    <a class="nav-link" href="{{ route('page.filter', 'Lote') }}">Lotes</a>
                </div>
                <form action="{{ route('page.index') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control rounded" placeholder="digite sua busca"/>
                        <button type="submit" class="btn btn-outline-primary btn-sm">Buscar</button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.index') }}">
                                        Editar Cadastro
                                </a>
                                <a class="dropdown-item" href="{{ route('imovel.index') }}">
                                        Imóveis Cadastrados
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</section>