<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3
            py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="{{ route('TuteurDashboard') }}">LEBONPROF</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('TuteurMesDemandes') }}">Mes demandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('TuteurReservationsEnCours') }}">Résérvations en cours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('TuteurReservationsConfirmees') }}">Réservations confirmées</a>
                </li>
            </ul>
            
            @if (Auth::guard('tuteur')->user())
            <div class="d-flex">
                <button type="button" class="btn btn-outline-dark
                    shadow-none me-lg-2 me-3"
                    data-bs-toggle="modal" data-bs-target="#TuteurEditModal">
                    Modifier le profil
                </button>
                <form action="{{ route('TuteurLogout') }}">
                    <button type="submit" class="btn btn-dark
                    shadow-none">
                        Déconnexion
                    </button>
                </form>
            </div>
            @endif


        </div>
    </div>
</nav>
