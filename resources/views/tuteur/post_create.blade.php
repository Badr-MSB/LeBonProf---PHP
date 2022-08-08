<button type="button" class="btn btn-dark shadow-none m-3" data-bs-toggle="modal"
    data-bs-target="#PostCreateModal">
    <i class="bi bi-plus-circle fs-6 me-2"></i>
    Ajouter une annonce
</button>
<div class="modal fade" id="PostCreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('post_create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-plus-circle fs-3 me-2"></i>
                        Créer une nouvelle annonce
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Titre</label>
                                <input type="text" class="form-control
                                            shadow-none" name="titre">
                                @error('titre')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Tuteur</label>
                                <input type="text" class="form-control
                                            shadow-none" value="{{ Auth::guard('tuteur')->user()->nom }}" disabled>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Matière</label>
                                <input type="text" class="form-control
                                            shadow-none" name="matiere">
                                @error('matiere')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Capacité</label>
                                <input type="text" class="form-control
                                            shadow-none" name="capacity">
                                @error('capacity')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Prix/h</label>
                                <input type="text" class="form-control
                                            shadow-none" name="prix">
                                @error('prix')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 ps-0">
                                <label class="form-label">Description</label>
                                <input type="text-area" class="form-control
                                            shadow-none" name="description">
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-dark
                                    shadow-none">
                                    <i class="bi bi-plus-circle fs-6 me-2"></i>Créer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
