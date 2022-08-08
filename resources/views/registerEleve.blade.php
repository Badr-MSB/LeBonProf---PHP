<div class="modal fade" id="registerParentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('StudentRegistration_submit') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-plus-fill fs-3 me-2"></i>
                        Inscription Parent
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
                                            shadow-none" name="nom">
                                @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Prénom</label>
                                <input type="text" class="form-control
                                            shadow-none" name="prenom">
                                @error('prenom')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 ps-0">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control
                                            shadow-none" name="email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control
                                            shadow-none" name="password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Téléphone</label>
                                <input type="number" class="form-control
                                            shadow-none" name="telephone">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Ville</label>
                                <input type="text" class="form-control
                                            shadow-none" name="ville">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-dark
                                    shadow-none">s'inscrire</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>