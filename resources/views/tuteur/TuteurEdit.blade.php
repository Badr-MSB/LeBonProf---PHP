<div class="modal fade" id="TuteurEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('TuteurEdit') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-pencil-square fs-3 me-2"></i>
                        Modification
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control
                                            shadow-none" name="nom" value="{{ Auth::guard('tuteur')->user()->nom }}" disabled>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Prénom</label>
                                <input type="text" class="form-control
                                            shadow-none" name="prenom" value="{{ Auth::guard('tuteur')->user()->prenom }}" disabled>
                            </div>
                            <div class="col-md-6 ps-0">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control
                                            shadow-none" name="email" value="{{ Auth::guard('tuteur')->user()->email }}" disabled>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Téléphone</label>
                                <input type="number" class="form-control
                                            shadow-none" name="telephone" value="{{ Auth::guard('tuteur')->user()->telephone }}">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control
                                            shadow-none" name="password">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Confirmez le mot de passe</label>
                                <input type="password" class="form-control
                                            shadow-none" name="retype_password">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Ville</label>
                                <input type="text" class="form-control
                                            shadow-none" name="ville" value="{{ Auth::guard('tuteur')->user()->ville }}">
                            </div>
                            <div class="col-md-12 ps-0 mb-3">
                                <label class="form-label">bio</label>
                                <input type="text-area" class="form-control
                                            shadow-none" name="bio" value="{{ Auth::guard('tuteur')->user()->bio }}">
                            </div>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-dark
                                    shadow-none">Modifier</button>
                        <a href="{{ route('TuteurDelete') }}" class="btn btn-danger
                                    shadow-none"
                            onClick="return confirm('Vous confirmez la suppression de votre compte?')">
                            Supprimer mon profil</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>