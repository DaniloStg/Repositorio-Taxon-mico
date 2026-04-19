/*** 
 * cálculo PMA, grupos G1-G4, exportación PDF/XLSX 
 ***/
(function () {
  'use strict';

  /* =============================================
     TAXA DATA
     ============================================= */
  const taxaData = [
    { g: "G1", n: "Hydropsychidae", c: "Hydsy", b_ref: 4.39241577428483 },
    { g: "G1", n: "Leptoceridae", c: "Lep", b_ref: 1.66364405631322 },
    { g: "G1", n: "Limnephilidae", c: "Lim", b_ref: 2.17124467967813 },
    { g: "G1", n: "Odontoceridae", c: "Odon", b_ref: 2.70043875060649 },
    { g: "G1", n: "Philopotamidae", c: "Phil", b_ref: 2.90180975189982 },
    { g: "G1", n: "Caenidae", c: "Caen", b_ref: 6.79008333117018 },
    { g: "G1", n: "Leptohyphidae", c: "Leptohy", b_ref: 6.70627109952791 },
    { g: "G1", n: "Leptophlebiidae", c: "Leptoph", b_ref: 2.53027490635336 },
    { g: "G2", n: "Baetidae", c: "Baet", b_ref: 6.63354570520064 },
    { g: "G1", n: "Coenagrionidae", c: "Coenagr", b_ref: 3.87543108019667 },
    { g: "G2", n: "Hydroptilidae", c: "Hydpt", b_ref: 5.91786955362542 },
    { g: "G2", n: "Ceratopogonidae", c: "Cerato", b_ref: 4.05983030142959 },
    { g: "G2", n: "Chironomidae", c: "Chir", b_ref: 6.82596707974165 },
    { g: "G2", n: "Simuliidae", c: "Simu", b_ref: 6.78970458200503 },
    { g: "G2", n: "Elmidae", c: "Elm", b_ref: 6.48381627409667 },
    { g: "G2", n: "Staphylinidae", c: "Staph", b_ref: 3.85536300165374 },
    { g: "G2", n: "Tabanidae", c: "Tab", b_ref: 3.58543256868272 },
    { g: "G3", n: "Curculionidae", c: "Curc", b_ref: 0.452865519467723 },
    { g: "G3", n: "Dytiscidae", c: "Dyt", b_ref: 2.39659172222833 },
    { g: "G3", n: "Nematoda", c: "Nemat", b_ref: 0.0951969102893855 },
    { g: "G3", n: "Hirudinea", c: "Hirud", b_ref: 0.35114608780841 },
    { g: "G3", n: "Annelida", c: "Anel", b_ref: 0.905224245443 },
    { g: "G3", n: "Ancylidae", c: "Ancy", b_ref: 0.298128388564839 },
    { g: "G3", n: "Lymnaeidae", c: "Lymna", b_ref: 0.974435746045968 },
    { g: "G3", n: "Muscidae", c: "Musc", b_ref: 1.61776908382066 },
    { g: "G4", n: "Helicopsychidae", c: "Hel", b_ref: 0.538703373569773 },
    { g: "G4", n: "Hydrobiosidae", c: "Hydbs", b_ref: 2.2254435974122 },
    { g: "G4", n: "Culicidae", c: "Cul", b_ref: 0.366703186654392 },
    { g: "G4", n: "Empididae", c: "Emp", b_ref: 2.03504278580821 },
    { g: "G4", n: "Ephydridae", c: "Ephy", b_ref: 0.0324504104219485 },
    { g: "G4", n: "Psychodidae", c: "Psych", b_ref: 1.46196485063943 },
    { g: "G4", n: "Stratiomyidae", c: "Strat", b_ref: 0.0947081115859165 },
    { g: "G4", n: "Hydrophilidae", c: "Hidroph", b_ref: 2.17167598916964 },
    { g: "G4", n: "Scirtidae", c: "Scir", b_ref: 0.541278343257515 },
    { g: "G4", n: "Belostomatidae", c: "Belos", b_ref: 0.372806300592704 },
    { g: "G4", n: "Cicadellidae", c: "Cicad", b_ref: 0.311818787577659 },
    { g: "G4", n: "Lestidae", c: "Lest", b_ref: 0.554342812363059 },
    { g: "G4", n: "Anisoptera", c: "Anis", b_ref: 0.702574879420639 },
    { g: "G4", n: "Crambidae", c: "Cram", b_ref: 1.49721061770454 },
    { g: "G4", n: "Entomobryidae", c: "Entomo", b_ref: 1.75982931811588 },
    { g: "G4", n: "Crustacea", c: "Crust", b_ref: 0.358946435572115 }
  ];

  /* Info grupos */
  const groupMeta = {
    G1: { label: 'Grupo G1 – Sensibles', cls: 'g1' },
    G2: { label: 'Grupo G2 – Moderados', cls: 'g2' },
    G3: { label: 'Grupo G3 – Tolerantes', cls: 'g3' },
    G4: { label: 'Grupo G4 – Muy tolerantes', cls: 'g4' }
  };

  /* Porcentajes de referencia para cada grupo según PMA */
  function getThresholds(score) {
    if (score === null || score === undefined) return null;
    if (score >= 60) return {
      G1: { thr: '≥ 30%', ok: p => p >= 30, err: 'Bajo' },
      G2: { thr: '≤ 40%', ok: p => p <= 40, err: 'Alto' },
      G3: { thr: '≤ 7%',  ok: p => p <= 7,  err: 'Alto' },
      G4: { thr: '≤ 15%', ok: p => p <= 15, err: 'Alto' }
    };
    if (score >= 50 && score <= 59) return {
      G1: { thr: '25-30%', ok: p => p >= 25 && p <= 30, err: p => p < 25 ? 'Bajo' : 'Alto' }, 
      G2: { thr: '≤ 40%',  ok: p => p <= 40, err: 'Alto' },
      G3: { thr: '≤ 10%',  ok: p => p <= 10, err: 'Alto' },
      G4: { thr: '≤ 20%',  ok: p => p <= 20, err: 'Alto' }
    };
    if (score >= 39 && score <= 49) return {
      G1: { thr: '< 25%', ok: p => p < 25, err: 'Alto' },
      G2: { thr: '> 40%', ok: p => p > 40, err: 'Bajo' },
      G3: { thr: '≤ 15%', ok: p => p <= 15, err: 'Alto' },
      G4: { thr: '≤ 25%', ok: p => p <= 25, err: 'Alto' }
    };
    return {
      G1: { thr: '< 20%', ok: p => p < 20, err: 'Alto' },
      G2: { thr: '> 45%', ok: p => p > 45, err: 'Bajo' },
      G3: { thr: '> 15%', ok: p => p > 15, err: 'Bajo' },
      G4: { thr: '> 25%', ok: p => p > 25, err: 'Bajo' }
    };
  }

  /* =============================================
   TAXA GRID
   ============================================= */
  function buildGrid() {
    const container = document.getElementById('pma-taxa-content');
    if (!container) return;

    ['G1', 'G2', 'G3', 'G4'].forEach(g => {
      const section = document.createElement('div');
      section.className = 'group-section';

      // const meta = groupMeta[g];
      const title = document.createElement('div');
      title.className = `group-section__title group-section__title--${groupMeta[g].cls}`;
      // title.innerHTML = `<span>${meta.label}</span>`;
      title.textContent = groupMeta[g].label;
      section.appendChild(title);

      const grid = document.createElement('div');
      grid.className = 'row g-1';
      grid.id = `pma-grid-${g}`;
      section.appendChild(grid);
      container.appendChild(section);
    });

    taxaData.forEach((t, i) => {
      const col = document.createElement('div');
      col.className = 'col-12 col-sm-6'; // col-xl-4
      col.innerHTML = `
        <div class="taxa-row" data-row="${i}">
          <span class="taxa-code">${t.c}</span>
          <span class="taxa-name" title="${t.n}">${t.n}</span>
          <input type="number" class="taxa-input" data-idx="${i}" min="0" step="1" placeholder="0">
        </div>`;
      document.getElementById(`pma-grid-${t.g}`).appendChild(col);
    });
  }

  /*  Validación inputs negativos */
  function attachInputGuards() {
    const tc = document.getElementById('pma-taxa-content'); if (!tc) return;
    tc.addEventListener('keydown', e => {
      if (!e.target.classList.contains('taxa-input')) return;
      if (e.key === '-' || e.key === '+' || e.key === 'e' || e.key === 'E') e.preventDefault();
    });
    tc.addEventListener('input', e => {
      if (!e.target.classList.contains('taxa-input')) return;
      const inp = e.target; const val = inp.value;
      const row = inp.closest('.taxa-row');
      const neg = val !== '' && parseFloat(val) < 0;
      inp.classList.toggle('is-invalid', neg);
      row.classList.toggle('has-error', neg);
      if (neg) row.classList.remove('has-value');
    });
  }

  // guía visual - errores
  function hasErrors() {
    let found = false;
    document.querySelectorAll('#pma-taxa-content .taxa-input').forEach(inp => {
      if (inp.value !== '' && parseFloat(inp.value) < 0) found = true;
    });
    return found;
  }

  /* =============================================
     MATH
     ============================================= */
  function combinations(n, k) {
    if (k < 0 || k > n) return 0;
    if (k === 0 || k === n) return 1;
    if (k > n / 2) k = n - k;
    let res = 1;
    for (let i = 1; i <= k; i++) res = res * (n - i + 1) / i;
    return res;
  }

  function hypergeom_0(n_sub, N_fam, N_total) {
    if (N_total - N_fam < n_sub) return 0;
    return combinations(N_total - N_fam, n_sub) / combinations(N_total, n_sub);
  }

  /* =============================================
     CÁLCULO
     ============================================= */
  let lastResults = null;
  function calculate() {
    if (hasErrors()) { showErrorState(); return; }
    const inputs = document.querySelectorAll('#pma-taxa-content .taxa-input');
    let n_site = 0, activeTaxas = 0;
    const dataEntries = [];

    inputs.forEach(inp => {
      const val = parseInt(inp.value) || 0;
      const row = inp.closest('.taxa-row');

      // guía visual
      if (val > 0) {
        row.classList.add('has-value');
        n_site += val;
        activeTaxas++;
        const item = taxaData[inp.dataset.idx];
        dataEntries.push({ val, b_ref: item.b_ref, group: item.g, name: item.n, code: item.c });
      } else {
        row.classList.remove('has-value');
      }
    });

    if (n_site === 0) {
      updateUI(0, 0, { G1: 0, G2: 0, G3: 0, G4: 0 }, 0);
      lastResults = null;
      return;
    }

    const n_efectiva = Math.round(n_site / activeTaxas);
    let sumaPi = 0;
    const familyResults = dataEntries.map(e => {
      const pi = 1 - hypergeom_0(n_efectiva, e.val, n_site);
      sumaPi += pi;
      return { ...e, pi };
    });

    let sumaDiferencias = 0;
    const bi_groups = { G1: 0, G2: 0, G3: 0, G4: 0 };

    familyResults.forEach(e => {
      const bi_site = 100 * (e.pi / sumaPi);
      bi_groups[e.group] += bi_site;
      sumaDiferencias += Math.abs(bi_site - e.b_ref);
    });

    taxaData.forEach(t => {
      if (!dataEntries.some(de => de.code === t.c)) sumaDiferencias += t.b_ref;
    });

    const pma_final = 100 - (0.5 * sumaDiferencias);

    updateUI(n_site, pma_final, bi_groups, n_efectiva);

    lastResults = { n_site, pma_final, bi_groups, familyResults, n_efectiva, sumaPi };
  }

  /* =============================================
     ACTUALIZAR UI
     ============================================= */
  function showErrorState() {
    const sc = document.getElementById('pma-score');
    if (sc) { sc.textContent = '—'; sc.className = 'pma-result-index state-error'; }
    const badge = document.getElementById('pma-quality-badge');
    if (badge) { badge.className = 'pma-badge pma-badge--error mx-auto my-3'; badge.textContent = 'ERROR'; }
    const interp = document.getElementById('pma-interpretation-text');
    if (interp) interp.textContent = 'Los valores ingresados no pueden ser negativos.';
    document.getElementById('pma-warning-box')?.classList.remove('visible');
    document.getElementById('pma-total-n') && (document.getElementById('pma-total-n').textContent = '—');
    document.getElementById('pma-n-efect') && (document.getElementById('pma-n-efect').textContent = '—');
    clearGroupTable(); lastResults = null;
  }

  function clearGroupTable() {
    ['G1', 'G2', 'G3', 'G4'].forEach(g => {
      const gl = g.toLowerCase();
      const v = document.getElementById(`pma-p${gl}-val`);
      const t = document.getElementById(`pma-thr-${gl}`);
      const s = document.getElementById(`pma-p${gl}-status`);
      if (v) v.textContent = '—'; if (t) t.textContent = '—';
      if (s) { s.className = 'group-status group-status--nd'; s.textContent = '—'; }
    });
  }

  function updateUI(n, pma_score, bi_groups, n_efect) {
    // valores
    const score = document.getElementById('pma-score');
    if (score) {
      score.className = 'pma-result-index';
      score.textContent = n > 0 ? pma_score.toFixed(2) : '0.00';
    }
    const tn = document.getElementById('pma-total-n');
    if (tn) tn.textContent = n;

    const ne = document.getElementById('pma-n-efect');
    if (ne) ne.textContent = n > 0 ? n_efect : '—';

    // etiqueta de calidad + interpretación
    const badge = document.getElementById('pma-quality-badge');
    const interp = document.getElementById('pma-interpretation-text');

    if (badge) {
      badge.className = 'pma-badge mx-auto my-3';

      if (n === 0) {
        badge.classList.add('pma-badge--nodata');
        badge.textContent = 'SIN DATOS';
        interp.textContent = '';
      } else if (pma_score >= 60) { // > 60 (≥ P80)
        badge.classList.add('pma-badge--excelente');
        badge.textContent = 'EXCELENTE';
        interp.textContent = 'Calidad natural o muy cercana a la referencia.';
      } else if (pma_score >= 50 && pma_score < 60) { // 50 – 59 (P50–P80) (considera decimales de 59)
        badge.classList.add('pma-badge--buena');
        badge.textContent = 'BUENA';
        interp.textContent = 'Ligera alteración respecto al modelo de referencia.';
      } else if (pma_score >= 39 && pma_score < 50) { // 39 – 49 (P20–P50) (considera decimales de 49)
        badge.classList.add('pma-badge--regular');
        badge.textContent = 'REGULAR';
        interp.textContent = 'Alteración moderada de la comunidad bentónica.';
      } else { // < 39
        badge.classList.add('pma-badge--mala');
        badge.textContent = 'MALA';
        interp.textContent = 'Comunidad severamente degradada.';
      }
    }

    // advertencia
    const warn = document.getElementById('pma-warning-box');
    if (warn) (n > 0 && n < 100) ? warn.classList.add('visible') : warn.classList.remove('visible');

    // group table
    const thr = n > 0 ? getThresholds(pma_score) : null;
    ['G1', 'G2', 'G3', 'G4'].forEach(g => {
      const gl = g.toLowerCase(); const pct = bi_groups[g];
      const vEl = document.getElementById(`pma-p${gl}-val`);
      const tEl = document.getElementById(`pma-thr-${gl}`);
      const sEl = document.getElementById(`pma-p${gl}-status`);
      if (vEl) vEl.textContent = pct.toFixed(2) + '%';
      if (tEl) tEl.textContent = thr ? thr[g].thr : '—';
      if (sEl) {
        sEl.className = 'group-status';
        if (!thr) { sEl.classList.add('group-status--nd'); sEl.textContent = '—'; }
        else if (thr[g].ok(pct)) { sEl.classList.add('group-status--ok'); sEl.textContent = 'OK'; }
        else { sEl.classList.add('group-status--fuera'); sEl.textContent = thr[g].err; }
      }
    });
  }

  /* =============================================
     LIMPIAR DATOS
     ============================================= */
  function resetTaxa() {
    if (!confirm('¿Desea limpiar todos los valores ingresados?')) return;
    document.querySelectorAll('#pma-taxa-content .taxa-input').forEach(i => {
      i.value = '';
      i.classList.remove('is-invalid');
      i.closest('.taxa-row').classList.remove('has-value', 'has-error');
    });
    lastResults = null;
    calculate();
  }

  function resetMeta() {
    if (!confirm('¿Desea limpiar todos los datos ingresados?')) return;
    ['input-sitio', 'input-fecha', 'input-ciclo', 'input-metodo', 'input-obs'].forEach(id => {
      const el = document.getElementById(id);
      if (el) { el.value = ''; el.classList.remove('field-error'); }
    });
    ['err-sitio', 'err-fecha', 'err-ciclo', 'err-metodo'].forEach(id => {
      document.getElementById(id)?.classList.remove('visible');
    });
  }

  /* =============================================
     EXPORTAR - DATOS
     ============================================= */

  /* Meta listeners */
  function attachMetaFieldListeners() {
    [['input-sitio', 'err-sitio'], ['input-fecha', 'err-fecha'],
    ['input-ciclo', 'err-ciclo'], ['input-metodo', 'err-metodo']].forEach(([iId, eId]) => {
      const el = document.getElementById(iId); if (!el) return;
      const clear = () => { if (el.value) { el.classList.remove('field-error'); document.getElementById(eId)?.classList.remove('visible'); } };
      el.addEventListener('input', clear); el.addEventListener('change', clear);
    });
  }

  /* Validar meta */
  function getSiteMeta() {
    return {
      sitio: document.getElementById('input-sitio')?.value.trim() || '',
      fecha: document.getElementById('input-fecha')?.value || '',
      ciclo: document.getElementById('input-ciclo')?.value || '',
      metodo: document.getElementById('input-metodo')?.value || '',
      obs: document.getElementById('input-obs')?.value.trim() || ''
    };
  }

  function validateMeta() {
    const meta = getSiteMeta();
    const fields = [
      { inputId: 'input-sitio', errId: 'err-sitio', val: meta.sitio },
      { inputId: 'input-fecha', errId: 'err-fecha', val: meta.fecha },
      { inputId: 'input-ciclo', errId: 'err-ciclo', val: meta.ciclo },
      { inputId: 'input-metodo', errId: 'err-metodo', val: meta.metodo }
    ];
    let valid = true;
    fields.forEach(f => {
      const inp = document.getElementById(f.inputId);
      const err = document.getElementById(f.errId);
      if (!f.val) { inp?.classList.add('field-error'); err?.classList.add('visible'); valid = false; }
      else { inp?.classList.remove('field-error'); err?.classList.remove('visible'); }
    });
    return valid ? meta : null;
  }

  function getQualityLabel() {
    return document.getElementById('pma-quality-badge')?.textContent || 'N/A';
  }

  /* =============================================
     EXPORTAR - PDF
     ============================================= */
  function exportPDF() {
    if (!lastResults || lastResults.n_site === 0) {
      alert('Ingrese datos de abundancia antes de exportar.'); return;
    }

    const isMValid = validateMeta();
    if (!isMValid) return;

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const res = lastResults;

    const meta = validateMeta();
    if (!meta) return;

    const quality = getQualityLabel();
    const totalPi = res.familyResults.reduce((a, b) => a + b.pi, 0);
    const thr = getThresholds(res.pma_final);

    // header
    doc.setFillColor(26, 58, 42);
    doc.rect(0, 0, 210, meta.obs ? 46 : 40, 'F');
    doc.setTextColor(255, 255, 255);
    doc.setFontSize(16);
    doc.setFont('helvetica', 'bold');
    doc.text('REPORTE PMA-SL', 14, 16);
    doc.setFontSize(9);
    doc.setFont('helvetica', 'normal');
    doc.text('Percent Model Affinity – Índice Biótico para Ríos Serranos', 14, 24);
    doc.text(`Sitio: ${meta.sitio}   |   Fecha: ${meta.fecha}   |   Ciclo: ${meta.ciclo}   |   Método: ${meta.metodo}`, 14, 32);
    if (meta.obs) { const ol = doc.splitTextToSize(`Obs.: ${meta.obs}`, 182); doc.text(ol, 14, 39); }

    doc.setTextColor(0, 0, 0);
    let y = meta.obs ? 56 : 50;

    // resultado principal
    doc.setFontSize(12);
    doc.setFont('helvetica', 'bold');
    doc.text('RESULTADO DEL SITIO', 14, y); y += 5;

    doc.autoTable({
      startY: y,
      head: [['Puntaje PMA-SL', 'Calidad ecológica', 'Total N (individuos)', 'N Efectiva']],
      body: [[
        res.pma_final.toFixed(2), quality, res.n_site, res.n_efectiva
      ]],
      theme: 'grid',
      headStyles: { fillColor: [45, 106, 79], textColor: 255, fontStyle: 'bold', fontSize: 8 },
      bodyStyles: { fontSize: 10, fontStyle: 'bold', halign: 'center' },
    });

    // grupos
    y = doc.lastAutoTable.finalY + 10;
    doc.setFontSize(12);
    doc.setFont('helvetica', 'bold');
    doc.text('COMPOSICIÓN POR GRUPOS (bi_site %)', 14, y); y += 5;

    doc.autoTable({
      startY: y,
      head: [['Grupo', 'Umbral esperado', '% Calculado', 'Estado']],
      body: [
        ['G1 – Sensibles', thr ? thr.G1.thr : '—', res.bi_groups.G1.toFixed(2) + '%', thr ? (thr.G1.ok(res.bi_groups.G1) ? 'OK' : 'Fuera') : '—'],
        ['G2 – Moderados', thr ? thr.G2.thr : '—', res.bi_groups.G2.toFixed(2) + '%', thr ? (thr.G2.ok(res.bi_groups.G2) ? 'OK' : 'Fuera') : '—'],
        ['G3 – Tolerantes', thr ? thr.G3.thr : '—', res.bi_groups.G3.toFixed(2) + '%', thr ? (thr.G3.ok(res.bi_groups.G3) ? 'OK' : 'Fuera') : '—'],
        ['G4 – Muy tolerantes', thr ? thr.G4.thr : '—', res.bi_groups.G4.toFixed(2) + '%', thr ? (thr.G4.ok(res.bi_groups.G4) ? 'OK' : 'Fuera') : '—'],
      ],
      theme: 'striped',
      headStyles: { fillColor: [64, 145, 108], textColor: 255, fontSize: 8 },
      bodyStyles: { fontSize: 9 },
      columnStyles: {
        1: { textColor: [120, 120, 120], fontStyle: 'italic' },
        3: { halign: 'center' }
      }
    });

    // detalle de familias
    y = doc.lastAutoTable.finalY + 10;
    doc.setFontSize(12);
    doc.setFont('helvetica', 'bold');
    doc.text('DETALLE DE FAMILIAS REGISTRADAS', 14, y); y += 5;

    const tableData = res.familyResults.map(f => [
      f.group,
      f.name,
      f.code,
      f.val,
      f.b_ref.toFixed(4),
      (100 * (f.pi / totalPi)).toFixed(2) + '%'
    ]);

    doc.autoTable({
      startY: y,
      head: [['Grupo', 'Familia', 'Código', 'Abundancia', 'b_ref', 'bi_site']],
      body: tableData,
      theme: 'grid',
      headStyles: { fillColor: [26, 58, 42], textColor: 255, fontSize: 8 },
      bodyStyles: { fontSize: 8 },
      alternateRowStyles: { fillColor: [240, 248, 244] },
    });

    // footer
    const pageCount = doc.internal.getNumberOfPages();
    for (let i = 1; i <= pageCount; i++) {
      doc.setPage(i);
      doc.setFontSize(7);
      doc.setTextColor(150);
      doc.text(`Generado: ${new Date().toLocaleString('es-AR')}  ·  PMA-SL Calculadora  ·  Pág. ${i}/${pageCount}`, 14, 290);
    }

    doc.save(`PMA-SL_${meta.sitio.replace(/\s+/g, '_')}_${new Date().getTime()}.pdf`);
  }

  /* =============================================
     EXPORTAR - XLSX
     ============================================= */
  function exportXLSX() {
    if (!lastResults || lastResults.n_site === 0) {
      alert('Ingrese datos de abundancia antes de exportar.'); return;
    }

    const res = lastResults;
    const meta = getSiteMeta();
    const quality = getQualityLabel();
    const totalPi = res.familyResults.reduce((a, b) => a + b.pi, 0);
    const thr = getThresholds(res.pma_final);
    const wb = XLSX.utils.book_new();

    // hoja 1: resumen
    const summaryData = [
      ['PMA-SL – Reporte de Evaluación Ecológica'],
      [],
      ['Sitio', meta.sitio],
      ['Fecha de muestreo', meta.fecha],
      ['Ciclo hidrológico', meta.ciclo],
      ['Método', meta.metodo],
      [],
      ['Puntaje PMA-SL', res.pma_final.toFixed(2)],
      ['Calidad ecológica', quality],
      ['Total individuos (N)', res.n_site],
      ['N Efectiva', res.n_efectiva],
      [],
      ['Composición por grupos'],
      ['Grupo', '% Calculado', 'Umbral esperado', 'Estado'],
      ['G1 – Sensibles', parseFloat(res.bi_groups.G1.toFixed(2)), thr ? thr.G1.thr : '—', thr ? (thr.G1.ok(res.bi_groups.G1) ? 'OK' : 'Fuera') : '—'],
      ['G2 – Moderados', parseFloat(res.bi_groups.G2.toFixed(2)), thr ? thr.G2.thr : '—', thr ? (thr.G2.ok(res.bi_groups.G2) ? 'OK' : 'Fuera') : '—'],
      ['G3 – Tolerantes', parseFloat(res.bi_groups.G3.toFixed(2)), thr ? thr.G3.thr : '—', thr ? (thr.G3.ok(res.bi_groups.G3) ? 'OK' : 'Fuera') : '—'],
      ['G4 – Muy tolerantes', parseFloat(res.bi_groups.G4.toFixed(2)), thr ? thr.G4.thr : '—', thr ? (thr.G4.ok(res.bi_groups.G4) ? 'OK' : 'Fuera') : '—'],
    ];
    const ws1 = XLSX.utils.aoa_to_sheet(summaryData);
    ws1['!cols'] = [{ wch: 34 }, { wch: 20 }];
    XLSX.utils.book_append_sheet(wb, ws1, 'Resumen');

    // hoja 2: familias
    const header = ['Grupo', 'Familia', 'Código', 'Abundancia (N)', 'b_ref', 'bi_site (%)'];
    const rows = res.familyResults.map(f => [
      f.group,
      f.name,
      f.code,
      f.val,
      parseFloat(f.b_ref.toFixed(4)),
      parseFloat((100 * (f.pi / totalPi)).toFixed(2))
    ]);
    const ws2 = XLSX.utils.aoa_to_sheet([header, ...rows]);
    ws2['!cols'] = [{ wch: 6 }, { wch: 22 }, { wch: 10 }, { wch: 14 }, { wch: 10 }, { wch: 14 }];
    XLSX.utils.book_append_sheet(wb, ws2, 'Familias');

    // hoja 3: todas las familias (incluyendo ausentes)
    const allHeader = ['Grupo', 'Familia', 'Código', 'Abundancia (N)', 'b_ref'];
    const allRows = taxaData.map(t => {
      const found = res.familyResults.find(f => f.code === t.c);
      return [t.g, t.n, t.c, found ? found.val : 0, parseFloat(t.b_ref.toFixed(4))];
    });
    const ws3 = XLSX.utils.aoa_to_sheet([allHeader, ...allRows]);
    ws3['!cols'] = [{ wch: 6 }, { wch: 22 }, { wch: 10 }, { wch: 14 }, { wch: 10 }];
    XLSX.utils.book_append_sheet(wb, ws3, 'Todas las familias');

    XLSX.writeFile(wb, `PMA-SL_${meta.sitio.replace(/\s+/g, '_')}_${new Date().getTime()}.xlsx`);
  }

  /* =============================================
     INICIALIZAR
     ============================================= */
  document.addEventListener('DOMContentLoaded', () => {
    buildGrid();
    attachInputGuards();
    attachMetaFieldListeners();
    calculate();

    // Fecha máx = hoy
    // const today = new Date().toISOString().split('T')[0];
    const now = new Date();
    const today = [
      now.getFullYear(),
      String(now.getMonth() + 1).padStart(2, '0'),
      String(now.getDate()).padStart(2, '0')
    ].join('-');
    document.getElementById('input-fecha')?.setAttribute('max', today);

    // input listener
    document.getElementById('pma-taxa-content').addEventListener('input', calculate);

    // buttons
    document.getElementById('btn-limpiar-taxa')?.addEventListener('click', resetTaxa);
    document.getElementById('btn-limpiar-meta')?.addEventListener('click', resetMeta);
    document.getElementById('btn-pdf')?.addEventListener('click', exportPDF);
    document.getElementById('btn-xlsx')?.addEventListener('click', exportXLSX);
  });

})();