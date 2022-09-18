<section>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container container-fluid">
            <a class="navbar-brand" href="{{ route('imovel.index') }}">Ínicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Todos</a>
                    <a class="nav-link" href="#">Apartamentos</a>
                    <a class="nav-link" href="#">Casas</a>
                    <a class="nav-link" href="#">Kitnets</a>
                    <a class="nav-link" href="#">Lotes</a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </div>
            </div>
        </div>
    </nav>
</section>