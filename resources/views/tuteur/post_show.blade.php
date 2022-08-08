<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Titre</th>
                                    <th>Matière</th>
                                    <th>Capacité</th>
                                    <th>Prix/h</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->titre }}</td>
                                        <td>{{ $row->matiere }}</td>
                                        <td>{{ $row->capacity }}</td>
                                        <td>{{ $row->prix }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td class="">
                                            <a href="{{ route('TuteurPostEdit', $row->id) }}"
                                                class="btn btn-dark">Modifier</a>
                                            <a href="{{ route('post_delete', $row->id) }}" class="btn btn-danger"
                                                onClick="return confirm('Vous êtes sûr(e)?');">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>