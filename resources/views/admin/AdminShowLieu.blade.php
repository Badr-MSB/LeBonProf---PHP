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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
    @include('admin.nav')

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


    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-start"><i
                                class="bi bi-patch-check-fill fs-4 me-2 text-danger"></i>Lieux publiques non vérifiés</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Lieu</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Adresse</th>
                                        <th>Ville</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unconfirmed_lieux as $row)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="col-md-1 align-middle">{{ $row->nom }}</td>
                                            <td class="col-md-2 align-middle">{{ $row->email }}</td>
                                            <td class="col-md-2 align-middle">{{ $row->telephone }}</td>
                                            <td class="col-md-3 align-middle">{{ $row->adresse }}</td>
                                            <td class="col-md-2 align-middle">{{ $row->ville }}</td>
                                            <td class="col-md-2 align-middle">
                                                <a href="{{ route('AdminLieuValidate',$row->id) }}"
                                                    class="btn btn-success col-md-6 mb-1"
                                                    onClick="return confirm('Vous êtes sûr(e)?');">Valider</a>
                                                <a href="{{ route('AdminLieuDelete',$row->id) }}"
                                                    class="btn btn-dark col-md-6 mb-1"
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


    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-start"><i
                                class="bi bi-patch-check-fill fs-4 me-2 text-success"></i>Lieux publiques vérifiés</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Lieu</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Adresse</th>
                                        <th>Ville</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($confirmed_lieux as $row)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="col-md-1 align-middle">{{ $row->nom }}</td>
                                            <td class="col-md-2 align-middle">{{ $row->email }}</td>
                                            <td class="col-md-2 align-middle">{{ $row->telephone }}</td>
                                            <td class="col-md-3 align-middle">{{ $row->adresse }}</td>
                                            <td class="col-md-2 align-middle">{{ $row->ville }}</td>
                                            <td class="col-md-2 align-middle">
                                                <a href="{{ route('AdminLieuDelete',$row->id) }}"
                                                    class="btn btn-dark col-md-6 mb-1"
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








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
