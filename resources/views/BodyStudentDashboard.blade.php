<!-- masthead -->
<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Bienvenue {{ Auth::guard('web')->user()->prenom }}! Trouvez le
                    cours qui vous correspond</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
            </div>
        </div>
    </div>
</header>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">À votre service</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi bi-mortarboard-fill fs-1 text-dark"></i></div>
                    <h3 class="h4 mb-2">Recherche de cours</h3>
                    <p class="text-muted mb-0">Si vous êtes un parent, lancez votre recherche et trouvez le professeur
                        idéal à votre fils!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-laptop fs-1 text-dark"></i></div>
                    <h3 class="h4 mb-2">Expertises</h3>
                    <p class="text-muted mb-0">Si vous êtes un tuteur, n'hésitez pas à partager votre savoir et
                        donnez des cours à nos étudiants!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-globe fs-1 text-dark"></i></div>
                    <h3 class="h4 mb-2">Espaces de travail</h3>
                    <p class="text-muted mb-0">Si vous possédez un espace de travail, vous pouvez dès maintenant le
                        proposer à nos collaborateurs!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-shield-check fs-1 text-dark"></i></div>
                    <h3 class="h4 mb-2">Haute sécurité</h3>
                    <p class="text-muted mb-0">Réservez et postuler vos annonces en toute sécurité!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5">
        <div class="small text-center text-muted">Copyright &copy; 2022 - LEBONPROF</div>
    </div>
</footer>