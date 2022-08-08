<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3
            py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="{{ route('home') }}">LEBONPROF</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
            </ul>
            <div class="d-flex">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-outline-dark dropdown-toggle me-3"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Connexion
                    </button>
                    <ul class="dropdown-menu p-0" aria-labelledby="btnGroupDrop1">
                        <li><button type="button" class="btn btn-outline-dark
                                shadow-none me-lg-2 me-3" style="width:100%;" data-bs-toggle="modal"
                                data-bs-target="#loginParentModal">
                                Parent
                            </button></li>
                        <li><button type="button" class="btn btn-outline-dark
                                shadow-none me-lg-2 me-3" style="width:100%;" data-bs-toggle="modal"
                                data-bs-target="#loginTuteurModal">
                                Tuteur
                            </button></li>
                        <li><button type="button" class="btn btn-outline-dark
                                shadow-none me-lg-2 me-3" style="width:100%;" data-bs-toggle="modal"
                                data-bs-target="#loginLieuModal">
                                Lieu publique
                            </button></li>
                    </ul>
                </div>

                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle me-3"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Inscription
                    </button>
                    <ul class="dropdown-menu p-0" aria-labelledby="btnGroupDrop1">
                        <li><button type="button" class="btn btn-outline-dark
                                shadow-none me-lg-2 me-3" style="width:100%;" data-bs-toggle="modal"
                                data-bs-target="#registerParentModal">
                                Parent
                            </button></li>
                        <li><button type="button" class="btn btn-outline-dark
                                shadow-none me-lg-2 me-3" style="width:100%;" data-bs-toggle="modal"
                                data-bs-target="#registerTuteurModal">
                                Tuteur
                            </button></li>
                        <li><button type="button" class="btn btn-outline-dark
                                shadow-none me-lg-2 me-3" style="width:100%;" data-bs-toggle="modal"
                                data-bs-target="#registerLieuModal">
                                Lieu publique
                            </button></li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
</nav>