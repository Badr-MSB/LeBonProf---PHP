<div class="modal fade" id="loginTuteurModal" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('TuteurLogin_Submit') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i>
                                Connexion Tuteur</h5>
                            <button type="reset" class="btn-close shadow-none"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control
                                    shadow-none" name="email">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control
                                    shadow-none" name="password">
                            </div>
                            <div class="d-flex align-items-center
                                justify-content-between">
                                <button type="submit" class="btn btn-dark
                                    shadow-none">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>