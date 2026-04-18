<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="calc-page py-4">
<div class="container-xl">

  <!-- TITULO -->
  <div class="calc-page-header mb-4">
    <h1 class="calc-page-title">
      <span class="calc-page-accent">PMA-SL</span> – Calculadora del Índice
      Percent Model Affinity para Ríos Serranos
    </h1>
    <p class="calc-page-sub">Ingrese la abundancia (N) de cada familia registrada en el sitio para obtener el índice.</p>
  </div>

  <div class="row g-4">

    <!-- COLUMNA IZQUIERDA: Carga de taxas -->
    <div class="col-lg-7">
      <div class="calc-card">
        <div class="calc-card__header d-flex justify-content-between align-items-center">
          <span><i class="bi bi-list-check me-2"></i>Carga de abundancias</span>
          <button class="btn btn-sm btn-outline-light" id="btn-limpiar-taxa">
            <i class="bi bi-trash3 me-1"></i>Limpiar
          </button>
        </div>
        <div class="calc-card__body" id="pma-taxa-content">
          <!-- Grupos G1–G4 generados por JS -->
        </div>
      </div>
    </div>

    <!-- COLUMNA DERECHA: Resultados + Exportar -->
    <div class="col-lg-5 d-flex flex-column gap-4">

      <!-- RESULTADO PMA -->
      <div class="calc-card">
        <div class="calc-card__header">
          <i class="bi bi-graph-up me-2"></i>Diagnóstico del sitio
        </div>
        <div class="calc-card__body text-center py-4">
          <div class="pma-result-index" id="pma-score">0.00</div>
          <div id="pma-quality-badge" class="pma-badge pma-badge--nodata mx-auto my-3">SIN DATOS</div>
          <p id="pma-interpretation-text" class="pma-interp-text"></p>

          <hr class="my-3">
          <div class="row g-2 text-center">
            <div class="col-6">
              <div class="pma-mini-stat">
                <div class="pma-mini-stat__label">Total N</div>
                <div class="pma-mini-stat__val" id="pma-total-n">0</div>
              </div>
            </div>
            <div class="col-6">
              <div class="pma-mini-stat">
                <div class="pma-mini-stat__label">N Efectivo</div>
                <div class="pma-mini-stat__val" id="pma-n-efect">—</div>
              </div>
            </div>
          </div>

          <!-- Warning N < 100 -->
          <div class="pma-warning-box" id="pma-warning-box">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <span>Advertencia: Muestra pequeña. La precisión disminuye en muestras menores a 100. El índice usará k=N.</span>
          </div>
        </div>
      </div>

      <!-- ANÁLISIS DE GRUPOS -->
      <div class="calc-card">
        <div class="calc-card__header">
          <i class="bi bi-pie-chart me-2"></i>Análisis de grupos (G1–G4)
        </div>
        <div class="calc-card__body p-0">
          <table class="table table-sm table-hover mb-0 group-table">
            <thead>
              <tr>
                <th>Grupo</th>
                <th>Umbral esperado</th>
                <th>% Calculado</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="group-dot group-dot--g1"></span> Sensibles</td>
                <td class="group-threshold" id="pma-thr-g1">—</td>
                <td id="pma-pg1-val">0.00%</td>
                <td><span class="group-status" id="pma-pg1-status">—</span></td>
              </tr>
              <tr>
                <td><span class="group-dot group-dot--g2"></span> Moderados</td>
                <td class="group-threshold" id="pma-thr-g2">—</td>
                <td id="pma-pg2-val">0.00%</td>
                <td><span class="group-status" id="pma-pg2-status">—</span></td>
              </tr>
              <tr>
                <td><span class="group-dot group-dot--g3"></span> Tolerantes</td>
                <td class="group-threshold" id="pma-thr-g3">—</td>
                <td id="pma-pg3-val">0.00%</td>
                <td><span class="group-status" id="pma-pg3-status">—</span></td>
              </tr>
              <tr>
                <td><span class="group-dot group-dot--g4"></span> Muy tolerantes</td>
                <td class="group-threshold" id="pma-thr-g4">—</td>
                <td id="pma-pg4-val">0.00%</td>
                <td><span class="group-status" id="pma-pg4-status">—</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- EXPORTAR -->
      <div class="calc-card">
        <div class="calc-card__header d-flex justify-content-between align-items-center">
          <span><i class="bi bi-box-arrow-up me-2"></i>Exportar</span>
          <button class="btn-header-clear" id="btn-limpiar-meta">
            <i class="bi bi-eraser"></i>Limpiar datos
          </button>
        </div>
        <div class="calc-card__body">
          <div class="mb-2">
            <label class="form-label small fw-semibold">Nombre del sitio<span class="text-danger ms-1">*</span></label>
            <input type="text" id="input-sitio" class="form-control form-control-sm" placeholder="Ej: Quebrada del Condorito">
            <div class="field-error-msg" id="err-sitio">Este campo es obligatorio.</div>
          </div>

          <div class="mb-2">
            <label class="form-label small fw-semibold">Fecha de muestreo<span class="text-danger ms-1">*</span></label>
            <input type="date" id="input-fecha" class="form-control form-control-sm">
            <div class="field-error-msg" id="err-fecha">Este campo es obligatorio.</div>
          </div>

          <div class="mb-2">
            <label class="form-label small fw-semibold">Ciclo hidrológico<span class="text-danger ms-1">*</span></label>
            <select id="input-ciclo" class="form-select form-select-sm">
              <option value="">— Seleccionar —</option>
              <option value="Aguas bajas">Aguas bajas</option>
              <option value="Aguas altas">Aguas altas</option>
            </select>
            <div class="field-error-msg" id="err-ciclo">Este campo es obligatorio.</div>
          </div>

          <div class="mb-2">
            <label class="form-label small fw-semibold">Método<span class="text-danger ms-1">*</span></label>
            <select id="input-metodo" class="form-select form-select-sm">
              <option value="">— Seleccionar —</option>
              <option value="Red D">Red D</option>
              <option value="Surber">Surber</option>
            </select>
            <div class="field-error-msg" id="err-metodo">Este campo es obligatorio.</div>
          </div>

          <div class="mb-4">
            <label class="form-label small fw-semibold">
              Observaciones
              <span class="fw-normal text-muted">(opcional)</span>
            </label>
            <textarea id="input-obs" class="form-control form-control-sm" rows="2"
              placeholder="Condiciones del sitio, notas de campo, etc."
              style="resize:vertical"></textarea>
          </div>

          <div class="d-flex gap-2 mb-2">
            <button class="btn btn-export-pdf flex-grow-1" id="btn-pdf">
              <i class="bi bi-filetype-pdf me-2"></i>Descargar PDF
            </button>
            <button class="btn btn-export-xlsx flex-grow-1" id="btn-xlsx">
              <i class="bi bi-file-earmark-spreadsheet me-2"></i>Exportar xlsx
            </button>
          </div>
          <p class="text-muted text-start" style="font-size:.73rem">
            <i class="bi bi-asterisk" style="font-size:.6rem"></i> Campos obligatorios para exportar
          </p>
        </div>
      </div>

    </div>
  </div>
</div>
</div>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('JavaScript/calculadora.js') ?>"></script>
<?= $this->endSection() ?>
