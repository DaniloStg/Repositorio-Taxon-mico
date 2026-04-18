<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'PMA-SL' ?> | Calculadora Biológica</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <!-- App CSS -->
  <link rel="stylesheet" href="<?= base_url('Styles/calculadora.css') ?>">
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark app-navbar">
    <div class="container-fluid px-4">
      <a class="navbar-brand d-flex align-items-center gap-2" href="<?= base_url('/') ?>">
        <span class="navbar-icon"><i class="bi bi-water"></i></span>
        <span>
          <span class="brand-main">PMA-SL</span>
          <!-- <span class="brand-sub d-none d-md-inline">Índice Biótico para Ríos Serranos</span> -->
        </span>
      </a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto gap-1">
          <!-- <li class="nav-item">
            <a class="nav-link <?= uri_string() === '' ? 'active' : '' ?>" href="<?= base_url('/') ?>">
              <i class="bi bi-house-door me-1"></i>Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= str_contains(uri_string(), 'calculadora') ? 'active' : '' ?>" href="<?= base_url('calculadora') ?>">
              <i class="bi bi-calculator me-1"></i>Calculadora
            </a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- MAIN CONTENT -->
  <main class="flex-grow-1">
    <?= $this->renderSection('content') ?>
  </main>

  <!-- FOOTER -->
  <footer class="app-footer py-3">
    <div class="container-fluid px-4">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start">
          <span class="footer-brand"><i class="bi bi-water me-1"></i>PMA-SL</span>
          <span class="footer-desc ms-2">Evaluación ecológica de ríos serranos</span>
        </div>
        <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
          <small class="footer-copy">Percent Model Affinity · Macroinvertebrados Bentónicos</small>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jsPDF -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
  <!-- SheetJS -->
  <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>

  <?= $this->renderSection('scripts') ?>
</body>
</html>
