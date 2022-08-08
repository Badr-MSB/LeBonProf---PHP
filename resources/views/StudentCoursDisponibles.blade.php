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
                    <div class="card-body text-center">
                        <h5 class="card-title text-center"><i class="bi bi-mortarboard-fill align-middle me-2"></i>Les cours disponibles</h5>
                        <div class="search-section mb-4 mt-4">
                            <div class="container">
                                <div class="inner">
                                    <form action="{{ route('SearchResult') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="text_item" class="form-control"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select name="matiere" id="matiere" class="form-select">
                                                        <option value=""></option>
                                                        @foreach ($matieres as $item)
                                                            <option value="{{ $item->matiere }}">
                                                                {{ $item->matiere }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select name="prix" id="prix"
                                                        class="form-select">
                                                        <option value=""></option>
                                                        <option value="Tri par : prix croissant">Tri par : prix croissant</option>
                                                        <option value="Tri par : prix décroissant">Tri par : prix décroissant</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit"
                                                    class="btn btn-dark">Rechercher</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Titre</th>
                                        <th>Tuteur</th>
                                        <th>Matière</th>
                                        <th>Prix</th>
                                        <th>Capacité</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->titre }}</td>
                                            <td>{{ $row->nom_tuteur }}</td>
                                            <td>{{ $row->matiere }}</td>
                                            <td>{{ $row->prix }}</td>
                                            <td>{{ App\Models\Reservation::where('id_post', $row->id)->count() . '/' . $row->capacity }}
                                            </td>
                                            <td>{{ $row->description }}</td>
                                            <td class="">
                                                <a href="{{ route('StudentReservation_submit', $row->id) }}"
                                                    class="btn btn-success"
                                                    onClick="return confirm('Vous êtes sûr(e)?');">Réserver</a>
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
</body>

</html>
