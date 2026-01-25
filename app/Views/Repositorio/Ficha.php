<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macroinvertebrados - Inicio</title>

    <link rel="stylesheet" href="<?= base_url('Styles/Ficha.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid mt-4">
        <div class="row justify-content-end">
            <div class="col-12 col-md-10 col-lg-9 pe-md-5">

                <div class="text-center">
                    <h2 class="text-uppercase fw-bold mb-1">Macroinvertebrados</h2>
                    <h3 class="h5 text-uppercase mb-3 opacity-75">Repositorio de Especies</h3>

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
                    </div>

                    <div class="organismo-list">

                        <div class="organismo-item">
                            <details>
                                <summary>
                                    <div class="organismo-img">
                                        <img src="images/organismo1.jpg" onerror="this.src='https://placehold.co/50x50?text=Org'">
                                    </div>
                                    <div class="organismo-info">
                                        <span class="organismo-name">
                                            <span class="organismo-code">Hydsy</span>
                                            Hydropsychidae
                                        </span>
                                        <span class="organismo-link">Ver ficha detallada ↓</span>
                                    </div>
                                </summary>

                                <div class="ficha-desplegada">
                                    <div class="ficha-head-azul">Información Técnica</div>
                                    <div class="ficha-cuerpo">
                                        <img src="https://placehold.co/800x300?text=Imagen+Completa+Organismo" class="ficha-foto-top">

                                        <div class="ficha-datos-grid">
                                            <div class="dato-item">
                                                <span class="dato-label">Nombre</span>
                                                <span class="dato-valor">Hydropsychidae</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Orden</span>
                                                <span class="dato-valor">Trichoptera</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Alimentación</span>
                                                <span class="dato-valor">Filtradores</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Hábitat</span>
                                                <span class="dato-valor">Ríos Correntosos</span>
                                            </div>
                                        </div>

                                        <div class="px-3 pb-2">
                                            <h6 class="text-uppercase fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 1px;">Descripción del Organismo</h6>
                                            <div class="p-3 bg-light border-start border-4 border-primary rounded-end" style="color: #444; font-size: 0.9rem; line-height: 1.6;">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            </div>
                                        </div>

                                        <div class="px-3 pb-3 mt-2">
                                            <details class="border rounded">
                                                <summary class="p-2 bg-light text-primary fw-bold" style="font-size: 0.85rem; cursor: pointer;">
                                                    <span class="me-2">✚</span> Ver detalles taxonómicos y notas
                                                </summary>
                                                <div class="p-3 border-top" style="font-size: 0.85rem; color: #555; background-color: #fdfdfd;">
                                                    <ul class="mb-0">
                                                        <li><strong>Familia:</strong> Hydropsychidae (Curtis, 1835)</li>
                                                        <li><strong>Ciclo de vida:</strong> Larvas acuáticas, adultos terrestres.</li>
                                                        <li><strong>Sensibilidad:</strong> Indicador de aguas de calidad moderada.</li>
                                                        <li><strong>Nota:</strong> Construyen redes de seda para capturar partículas.</li>
                                                    </ul>
                                                </div>
                                            </details>
                                        </div>

                                    </div>
                                </div>
                            </details>
                        </div>

                        <div class="organismo-item">
                            <details>
                                <summary>
                                    <div class="organismo-img">
                                        <img src="images/organismo1.jpg" onerror="this.src='https://placehold.co/50x50?text=Org'">
                                    </div>
                                    <div class="organismo-info">
                                        <span class="organismo-name">
                                            <span class="organismo-code">Cod</span>
                                            Nombre del Organismo 2
                                        </span>
                                        <span class="organismo-link">Ver ficha detallada ↓</span>
                                    </div>
                                </summary>

                                <div class="ficha-desplegada">
                                    <div class="ficha-head-azul">Información Técnica</div>
                                    <div class="ficha-cuerpo">
                                        <img src="https://placehold.co/800x300?text=Imagen+Completa+Organismo" onerror="this.src='https://placehold.co/50x50?text=Org'" class="ficha-foto-top">

                                        <div class="ficha-datos-grid">
                                            <div class="dato-item">
                                                <span class="dato-label">Nombre</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Orden</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Alimentación</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Hábitat</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <!-- <div class="dato-item">
                                                <span class="dato-label"></span>
                                                <span class="dato-valor"></span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label"></span>
                                                <span class="dato-valor"></span>
                                            </div> -->
                                        </div>

                                        <div class="px-3 pb-2">
                                            <h6 class="text-uppercase fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 1px;">Descripción del Organismo</h6>
                                            <div class="p-3 bg-light border-start border-4 border-primary rounded-end" style="color: #444; font-size: 0.9rem; line-height: 1.6;">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            </div>
                                        </div>

                                        <div class="px-3 pb-3 mt-2">
                                            <details class="border rounded">
                                                <summary class="p-2 bg-light text-primary fw-bold" style="font-size: 0.85rem; cursor: pointer;">
                                                    <span class="me-2">✚</span> Ver detalles taxonómicos y notas
                                                </summary>
                                                <div class="p-3 border-top" style="font-size: 0.85rem; color: #555; background-color: #fdfdfd;">
                                                    <ul class="mb-0">
                                                        <li><strong>Familia:</strong> ---</li>
                                                        <li><strong>Ciclo de vida:</strong> --- </li>
                                                        <li><strong>Sensibilidad:</strong> --- </li>
                                                        <li><strong>Nota:</strong> --- </li>
                                                    </ul>
                                                </div>
                                            </details>
                                        </div>

                                    </div>
                                </div>
                            </details>
                        </div>

                        <div class="organismo-item">
                            <details>
                                <summary>
                                    <div class="organismo-img">
                                        <img src="images/organismo1.jpg" onerror="this.src='https://placehold.co/50x50?text=Org'">
                                    </div>
                                    <div class="organismo-info">
                                        <span class="organismo-name">
                                            <span class="organismo-code">Cod</span>
                                            Nombre del Organismo 3
                                        </span>
                                        <span class="organismo-link">Ver ficha detallada ↓</span>
                                    </div>
                                </summary>

                                <div class="ficha-desplegada">
                                    <div class="ficha-head-azul">Información Técnica</div>
                                    <div class="ficha-cuerpo">
                                        <img src="https://placehold.co/800x300?text=Imagen+Completa+Organismo" class="ficha-foto-top">

                                        <div class="ficha-datos-grid">
                                            <div class="dato-item">
                                                <span class="dato-label">Nombre</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Orden</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Alimentación</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Hábitat</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <!-- <div class="dato-item">
                                                <span class="dato-label"></span>
                                                <span class="dato-valor"></span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label"></span>
                                                <span class="dato-valor"></span>
                                            </div> -->
                                        </div>

                                        <div class="px-3 pb-2">
                                            <h6 class="text-uppercase fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 1px;">Descripción del Organismo</h6>
                                            <div class="p-3 bg-light border-start border-4 border-primary rounded-end" style="color: #444; font-size: 0.9rem; line-height: 1.6;">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            </div>
                                        </div>

                                        <div class="px-3 pb-3 mt-2">
                                            <details class="border rounded">
                                                <summary class="p-2 bg-light text-primary fw-bold" style="font-size: 0.85rem; cursor: pointer;">
                                                    <span class="me-2">✚</span> Ver detalles taxonómicos y notas
                                                </summary>
                                                <div class="p-3 border-top" style="font-size: 0.85rem; color: #555; background-color: #fdfdfd;">
                                                    <ul class="mb-0">
                                                        <li><strong>Familia:</strong> ---</li>
                                                        <li><strong>Ciclo de vida:</strong> --- </li>
                                                        <li><strong>Sensibilidad:</strong> --- </li>
                                                        <li><strong>Nota:</strong> --- </li>
                                                    </ul>
                                                </div>
                                            </details>
                                        </div>

                                    </div>
                                </div>
                            </details>
                        </div>

                        <div class="organismo-item">
                            <details>
                                <summary>
                                    <div class="organismo-img">
                                        <img src="images/organismo1.jpg" onerror="this.src='https://placehold.co/50x50?text=Org'">
                                    </div>
                                    <div class="organismo-info">
                                        <span class="organismo-name">
                                            <span class="organismo-code">Cod</span>
                                            Nombre del Organismo 4
                                        </span>
                                        <span class="organismo-link">Ver ficha detallada ↓</span>
                                    </div>
                                </summary>

                                <div class="ficha-desplegada">
                                    <div class="ficha-head-azul">Información Técnica</div>
                                    <div class="ficha-cuerpo">
                                        <img src="https://placehold.co/800x300?text=Imagen+Completa+Organismo" class="ficha-foto-top">

                                        <div class="ficha-datos-grid">
                                            <div class="dato-item">
                                                <span class="dato-label">Nombre</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Orden</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Alimentación</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label">Hábitat</span>
                                                <span class="dato-valor">---</span>
                                            </div>
                                            <!-- <div class="dato-item">
                                                <span class="dato-label"></span>
                                                <span class="dato-valor"></span>
                                            </div>
                                            <div class="dato-item">
                                                <span class="dato-label"></span>
                                                <span class="dato-valor"></span>
                                            </div> -->
                                        </div>

                                        <div class="px-3 pb-2">
                                            <h6 class="text-uppercase fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 1px;">Descripción del Organismo</h6>
                                            <div class="p-3 bg-light border-start border-4 border-primary rounded-end" style="color: #444; font-size: 0.9rem; line-height: 1.6;">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            </div>
                                        </div>

                                        <div class="px-3 pb-3 mt-2">
                                            <details class="border rounded">
                                                <summary class="p-2 bg-light text-primary fw-bold" style="font-size: 0.85rem; cursor: pointer;">
                                                    <span class="me-2">✚</span> Ver detalles taxonómicos y notas
                                                </summary>
                                                <div class="p-3 border-top" style="font-size: 0.85rem; color: #555; background-color: #fdfdfd;">
                                                    <ul class="mb-0">
                                                        <li><strong>Familia:</strong> ---</li>
                                                        <li><strong>Ciclo de vida:</strong> --- </li>
                                                        <li><strong>Sensibilidad:</strong> --- </li>
                                                        <li><strong>Nota:</strong> --- </li>
                                                    </ul>
                                                </div>
                                            </details>
                                        </div>

                                    </div>
                                </div>
                            </details>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-4 mt-5 content-section">
        <small>Macroinvertebrados © 2026</small>
    </footer>

</body>

</html>