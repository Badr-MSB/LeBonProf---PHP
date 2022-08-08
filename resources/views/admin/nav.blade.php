<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3
            py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="{{ route('admin_dashboard') }}">LEBONPROF</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('AdminShowStudent') }}">Parents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('AdminShowTuteur') }}">Tuteurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('AdminShowLieu') }}">Lieux Publiques</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('AdminShowPosts') }}">Annonces</a>
                </li>
            </ul>
            <form action="{{ route('admin_logout') }}">
                <button type="submit" class="btn btn-dark
                shadow-none">
                    Déconnexion
                </button>
            </form>
            


        </div>
    </div>
</nav>