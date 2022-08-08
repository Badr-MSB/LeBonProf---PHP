<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3
            py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="{{ route('StudentDashboard') }}">LEBONPROF</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('StudentCoursDisponibles') }}">Cours Disponibles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('StudentMesDemandes') }}">Mes demandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('StudentMesRéservationsEnCours') }}">Mes réservations en cours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 active" aria-current="page" href="{{ route('StudentMesReservationsConfirmees') }}">Mes réservations Confirmées</a>
                </li>
                @if (Route::is('StudentDashboard'))
                <li class="nav-item"><a class="nav-link me-2 active" aria-current="page" href="#services">Services</a></li>
                @endif
            </ul>
            @if (Auth::guard('web')->user())
            <div class="d-flex">
                <button type="button" class="btn btn-outline-dark
                    shadow-none me-lg-2 me-3"
                    data-bs-toggle="modal" data-bs-target="#StudentEditModal">
                    Modifier le profil
                </button>
                <form action="{{ route('StudentLogout') }}">
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