<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Macroinvertebrados - Inicio</title> -->
    <title>Propuesta 2</title>


    <link rel="stylesheet" href="<?= base_url('Styles/RepositorioHome.css') ?>">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

    </style>

</head>

<body>

    <div class="container-fluid mt-4">
        <div class="row justify-content-end">

            <div class="col-12 col-md-10 col-lg-9 pe-md-5">

                <div class="text-center">
                    <h2 class="text-uppercase fw-bold mb-1">Macroinvertebrados</h2>
                    <h3 class="h5 text-uppercase mb-3 opacity-75">Repositorio de Especies</h3>

                    <nav class="macro-nav-container">

                        <?= view('Repositorio/Navegador/Nav.php') ?>

                    </nav>
                </div>

                <div class="mt-5 content-section">
                    <h2 class="fw-bold text-uppercase">Descripción</h2>
                    <hr>
                    <h6 class="mb-3">Información Sobre cada sección</h6>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <p><strong>Info 1:</strong> ---</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Info 2:</strong> ---</p>
                        </div>
                        <h6 class="text-uppercase fw-bold " style="font-size: 0.8rem; letter-spacing: 1px;">Organismos Relacionados</h6>

                    </div>

                    <div class="mt-2">

                        <div class="organismo-list">
                            <a href="ficha2" class="organismo-item">
                                <div class="organismo-img">
                                    <img src="images/organismo1.jpg" onerror="this.src='https://placehold.co/50x50?text=Org'">
                                </div>
                                <div class="organismo-info">
                                    <span class="organismo-name">
                                        <span class="organismo-code">Hydsy</span>
                                        Hydropsychidae
                                    </span>
                                    <span class="organismo-link">Ver ficha técnica &rarr;</span>
                                </div>
                            </a>

                            <a href="ruta/" class="organismo-item">
                                <div class="organismo-img">
                                    <img src="images/organismo2.jpg" onerror="this.src='https://placehold.co/50x50?text=Org'">
                                </div>
                                <div class="organismo-info">
                                    <span class="organismo-name">
                                        <span class="organismo-code">Cod</span>
                                        Nombre del Organismo 2
                                    </span>
                                    <span class="organismo-link">Ver ficha técnica &rarr;</span>
                                </div>
                            </a>

                            <a href="ruta/" class="organismo-item">
                                <div class="organismo-img">
                                    <img src="images/organismo2.jpg" onerror="this.src='https://placehold.co/50x50?text=Org'">
                                </div>
                                <div class="organismo-info">
                                    <span class="organismo-name">
                                        <span class="organismo-code">Cod</span>
                                        Nombre del Organismo 3
                                    </span>
                                    <span class="organismo-link">Ver ficha técnica &rarr;</span>
                                </div>
                            </a>

                            <a href="ruta/" class="organismo-item">
                                <div class="organismo-img">
                                    <img src="images/organismo2.jpg" onerror="this.src='https://placehold.co/50x50?text=Org'">
                                </div>
                                <div class="organismo-info">
                                    <span class="organismo-name">
                                        <span class="organismo-code">Cod</span>
                                        Nombre del Organismo 4
                                    </span>
                                    <span class="organismo-link">Ver ficha técnica &rarr;</span>
                                </div>
                            </a>

                        </div>
                    </div>

                    <!-- <p class="mt-3"><strong>Info 3 - Final</strong></p> -->
                </div>

            </div>
        </div>
    </div>

    <footer class="text-center py-4 mt-5 content-section">
        <small>Macroinvertebrados © 2026</small>
    </footer>

</body>

</html>