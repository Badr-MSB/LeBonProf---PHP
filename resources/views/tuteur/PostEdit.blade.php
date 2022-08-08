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
    @include('tuteur.tuteurNavbar')

    @include('tuteur.TuteurEdit')

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
                    <h5 class="card-title text-center m-3"><i class="bi bi-hourglass-split align-middle me-2"></i>Modifier l'annonce</h5>
                    <p><i class="bi bi-info-square-fill text-success fs-3 me-2 ms-3"></i>Améliorer la visibilité de votre annonce</p>
                    <div class="card-body">
                        <form action="{{ route('post_edit',$post->id) }}" method="POST">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Titre</label>
                                        <input type="text" class="form-control
                                                shadow-none" name="titre" value="{{ $post->titre }}">
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
                                                shadow-none" name="matiere" value="{{ $post->matiere }}">
                                        @error('matiere')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Capacité</label>
                                        <input type="text" class="form-control
                                                shadow-none" name="capacity" value="{{ $post->capacity }}">
                                        @error('capacity')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Prix/h</label>
                                        <input type="text" class="form-control
                                                shadow-none" name="prix" value="{{ $post->prix }}">
                                        @error('prix')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 ps-0">
                                        <label class="form-label">Description</label>
                                        <input type="text-area" class="form-control
                                                shadow-none" name="description" value="{{ $post->description }}">
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-dark
                                        shadow-none">Modifier</button>
                            </div>
                    </div>
                    </form>
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