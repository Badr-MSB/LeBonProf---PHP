<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEBONPROF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .h-font {
            font-family: 'Merienda', cursive;
        }

    </style>
</head>

<body>

    <!-- Navbar -->
    @include('lieu.LieuNavbar')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('failed'))
        <div class="alert alert-danger">
            {{ session('failed') }}
        </div>
    @endif


    @include('lieu.LieuEdit')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-center"><i class="bi bi-hourglass-bottom align-middle me-2"></i>Mes demandes</h5>
                        <p class="mb-4"><i class="bi bi-info-square-fill text-success fs-3 me-2"></i>Tous les
                            réservations au dessous sont confirmées :</p>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Parent</th>
                                        <th>Téléphone</th>
                                        <th>Tuteur</th>
                                        <th>Téléphone</th>
                                        <th>Bio</th>
                                        <th>Description de l'annonce</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $row)
                                        <tr class="align-middle">
                                            @if ($row->c_t && $row->c_l)
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->nom_student }}</td>
                                                <td>{{ $row->student_telephone }}</td>
                                                <td>{{ $row->nom_tuteur }}</td>
                                                <td>{{ $row->tuteur_telephone }}</td>
                                                <td>{{ $row->tuteur_bio }}</td>
                                                <td>{{ $row->description }}</td>
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








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
