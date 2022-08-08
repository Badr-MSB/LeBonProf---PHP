<h4>Les réservations envoyés :</h4>
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
                                    <th>Student</th>
                                    <th>Confirmation tut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $row)
                                    @if (!$row->c_t)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nom_student }}</td>
                                        <td>{{ $row->c_t }}</td>
                                        <td class="">
                                            <a href="{{ route('TuteurReservationValidate',$row->reservation_id) }}" class="btn btn-dark"
                                                onClick="return confirm('Vous êtes sûr(e)?');">Valider</a>
                                            <a href="{{ route('TuteurReservationDelete',$row->reservation_id) }}" class="btn btn-danger"
                                                onClick="return confirm('Vous êtes sûr(e)?');">Annuler</a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<h4>Les réservations en attente :</h4>
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
                                    <th>Student</th>
                                    <th>Lieu</th>
                                    <th>Confirmation lieu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $row)
                                    <tr>
                                        @if ($row->c_t && !$row->c_l)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nom_student }}</td>
                                        <td>{{ $row->nom_lieu }}</td>
                                        <td>{{ $row->c_l }}</td>
                                        <td>
                                            <a href="{{ route('TuteurLieuSelect', $row->reservation_id) }}" class="btn btn-dark"
                                                onClick="return confirm('Vous êtes sûr(e)?');">Choisir le lieu</a>
                                        </td>   
                                        @endif
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

<h4>Les réservations confirmées :</h4>
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
                                    <th>Student</th>
                                    <th>Lieu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $row)
                                    <tr>
                                        @if ($row->c_t && $row->c_l)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nom_student }}</td>
                                        <td>{{ $row->nom_lieu }}</td>
                                        <td>
                                            <a href="{{ route('TuteurReservationDelete', $row->reservation_id) }}" class="btn btn-danger"
                                                onClick="return confirm('Vous êtes sûr(e)?');">Annuler le RDV</a>
                                        </td>   
                                        @endif
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