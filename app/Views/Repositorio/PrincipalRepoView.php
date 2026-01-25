<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macroinvertebrados - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #61ad66;
            color: white;
        }

        .macro-nav-container {
            display: flex;
            justify-content: center;
            gap: 12px;
            overflow-x: auto;
            padding: 15px 10px;
            -webkit-overflow-scrolling: touch;
        }

        .macro-card-mini {
            background: #fff;
            border: 1px solid #ccc;
            text-align: center;
            padding: 6px;
            text-decoration: none;
            color: #333;
            flex: 0 0 auto;
            width: 95px;
            border-radius: 6px;
            transition: all 0.2s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Media Query para Celulares */
        @media (max-width: 768px) {
            .macro-nav-container {
                justify-content: flex-start;
            }

            .macro-card-mini {
                width: 85px;
            }

            h2 {
                font-size: 1.5rem;
            }

            h3 {
                font-size: 1.1rem;
            }
        }

        .macro-card-mini:hover,
        .macro-card-mini:active {
            border-color: #3498db;
            transform: scale(0.95);
        }

        .macro-card-mini img {
            width: 100%;
            height: 60px;
            object-fit: cover;
            display: block;
            margin-bottom: 4px;
            border-radius: 2px;
        }

        .macro-card-mini span {
            font-size: 0.7rem;
            font-weight: 700;
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .macro-nav-container::-webkit-scrollbar {
            height: 6px;
        }

        .macro-nav-container::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
        }

        .content-section {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <div class="container-fluid mt-4">
        <div class="row justify-content-end">

            <div class="col-12 col-md-10 col-lg-9 pe-md-5">

                <div class="text-center">
                    <h2 class="text-uppercase fw-bold mb-1">Titulo</h2>
                    <h3 class="h5 text-uppercase mb-3 opacity-75">Subtitulo</h3>

                    <nav class="macro-nav-container">
                        <a href="#" class="macro-card-mini">
                            <img src="images/home.jpg" onerror="this.src='https://placehold.co/100x70?text=Home'">
                            <span>Home</span>
                        </a>
                        <a href="#" class="macro-card-mini">
                            <img src="images/f1.jpg" onerror="this.src='https://placehold.co/100x70?text=F1'">
                            <span>Familia 1</span>
                        </a>
                        <a href="#" class="macro-card-mini">
                            <img src="images/f2.jpg" onerror="this.src='https://placehold.co/100x70?text=F2'">
                            <span>Familia 2</span>
                        </a>
                        <a href="#" class="macro-card-mini">
                            <img src="images/f3.jpg" onerror="this.src='https://placehold.co/100x70?text=F3'">
                            <span>Familia 3</span>
                        </a>
                        <a href="#" class="macro-card-mini">
                            <img src="images/f4.jpg" onerror="this.src='https://placehold.co/100x70?text=F4'">
                            <span>Familia 4</span>
                        </a>
                        <a href="#" class="macro-card-mini">
                            <img src="images/f5.jpg" onerror="this.src='https://placehold.co/100x70?text=F5'">
                            <span>Familia 5</span>
                        </a>
                        <a href="#" class="macro-card-mini">
                            <img src="images/f5.jpg" onerror="this.src='https://placehold.co/100x70?text=F6'">
                            <span>Familia 6</span>
                        </a>
                    </nav>
                </div>

                <div class="mt-5 content-section">
                    <h2 class="fw-bold text-uppercase">Descripción</h2>
                    <hr>
                    <h6 class="mb-3">Información Sobre cada sección</h6>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <p><strong>Info 1:</strong> ---</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Info 2:</strong> ---</p>
                        </div>
                    </div>

                    <p class="mt-3"><strong>Info 3, final</strong></p>
                </div>

            </div>
        </div>
    </div>

    <footer class="text-center py-4 mt-5 content-section">
        <small>Pie de pagina</small>
    </footer>

</body>

</html>