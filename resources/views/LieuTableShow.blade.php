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
    @include('StudentNavbar')





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



    @include('StudentEdit')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h5 class="card-title text-center mb-3"><i
                                    class="bi bi-geo-alt-fill me-2 align-middle"></i>Lieux Publiques</h5>
                            <p><i class="bi bi-info-square-fill text-success fs-3 me-2"></i>Choisissez votre lieu
                                publique parmi la liste.</p>
                            <table class="table table-bordered text-center" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Nom du lieu</th>
                                        <th>Adresse</th>
                                        <th>Ville</th>
                                        <th>Téléphone</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lieux as $lieu)
                                        @if ($lieu->disponible)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $lieu->nom }}</td>
                                                <td>{{ $lieu->adresse }}</td>
                                                <td>{{ $lieu->ville }}</td>
                                                <td>{{ $lieu->telephone }}</td>
                                                <td>{{ $lieu->description }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('StudentLieuSelectSubmit', ['id1' => $lieu->id, 'id2' => $id_reservation]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-dark shadow-none"
                                                            onClick="return confirm('Vous êtes sûr(e)?');">Réserver</button>
                                                    </form>
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>




