<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PMA-SL | Científica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
    
    <style>
        :root { --primary-dark: #0f172a; }
        body { background-color: #f1f5f9; padding-bottom: 180px; font-family: 'Segoe UI', sans-serif; }
        .header-pma { background: #075985; color: white; padding: 2rem 0; border-radius: 0 0 1.5rem 1.5rem; margin-bottom: 1.5rem; }
        .group-card { border-radius: 12px; border: none; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); margin-bottom: 1.5rem; }
        .group-header-G1 { border-top: 6px solid #198754; }
        .group-header-G2 { border-top: 6px solid #0dcaf0; }
        .group-header-G3 { border-top: 6px solid #ffc107; }
        .group-header-G4 { border-top: 6px solid #6c757d; }
        .taxa-input-group { background: #fff; border: 1px solid #dee2e6; border-radius: 8px; padding: 4px 10px; margin-bottom: 4px; display: flex; align-items: center; }
        .taxa-name { font-size: 0.85rem; flex-grow: 1; font-weight: 500; }
        .taxa-code { font-size: 0.7rem; color: #6c757d; margin-right: 10px; background: #e9ecef; padding: 2px 5px; border-radius: 4px; min-width: 55px; text-align: center; }
        .sticky-footer { position: fixed; bottom: 0; width: 100%; background: var(--primary-dark); color: white; padding: 1rem 0; z-index: 1050; border-top: 4px solid #075985; }
        #warning-box { font-size: 0.85rem; margin-bottom: 10px; display: none; }
    </style>
</head>
<body>

<div class="header-pma shadow">
    <div class="container">
        <h1 class="h3 fw-bold">Sistema de Evaluación PMA-SL</h1>
        <p class="mb-4 opacity-75">Cálculo Hipergeométrico Avanzado (Modelo Novak & Bone)</p>
        <div class="row g-3">
            <div class="col-md-3"><label class="small fw-bold text-white">GESTOR</label><input type="text" id="input-gestor" class="form-control form-control-sm border-0"></div>
            <div class="col-md-3"><label class="small fw-bold text-white">FECHA</label><input type="date" id="input-fecha" class="form-control form-control-sm border-0"></div>
            <div class="col-md-3"><label class="small fw-bold text-white">CICLO</label>
                <select id="input-ciclo" class="form-select form-select-sm border-0">
                    <option>Aguas Altas</option>
                    <option>Aguas Bajas</option>
                </select>
            </div>
            <div class="col-md-3"><label class="small fw-bold text-white">MUESTREADOR</label><input type="text" id="input-muestreador" class="form-control form-control-sm border-0"></div>
        </div>
    </div>
</div>

<div class="container">
    <div id="warning-box" class="alert alert-warning text-center fw-bold shadow-sm"></div>
    <div id="taxa-content" class="row"></div>
</div>

<div class="sticky-footer shadow-lg">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-6 col-md-2 border-end border-secondary">
                <small class="text-secondary d-block">TOTAL N_site</small>
                <span id="total-n" class="h4 fw-bold text-info">0</span>
            </div>
            <div class="col-6 col-md-2 border-end border-secondary">
                <small class="text-secondary d-block">PMA-SL FINAL</small>
                <span id="pma-score" class="h3 fw-bold text-white">0.00</span>
            </div>
            <div class="col-12 col-md-3 my-2 my-md-0">
                <div id="quality-badge" class="p-2 rounded fw-bold shadow-sm" style="background: #334155;">SIN DATOS</div>
                <small id="interpretation-text" class="d-block mt-1 text-secondary small italic"></small>
            </div>
            <div class="col-12 col-md-5 d-flex justify-content-center align-items-center gap-2">
                <div class="text-center px-1"><small class="text-success d-block small">G1%</small><b id="pg1">0%</b></div>
                <div class="text-center px-1"><small class="text-info d-block small">G2%</small><b id="pg2">0%</b></div>
                <div class="text-center px-1"><small class="text-warning d-block small">G3%</small><b id="pg3">0%</b></div>
                <div class="text-center px-1"><small class="text-secondary d-block small">G4%</small><b id="pg4">0%</b></div>
                <div class="ms-auto d-flex gap-2">
                    <button class="btn btn-primary btn-sm" onclick="exportPDF()">Descargar PDF</button>
                    <button class="btn btn-outline-danger btn-sm" onclick="resetAll()">Borrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const taxaData = [
        { g: "G1", n: "Hydropsychidae", c: "Hydsy", b_ref: 4.39241577428483 }, { g: "G1", n: "Leptoceridae", c: "Lep", b_ref: 1.66364405631322 },
        { g: "G1", n: "Limnephilidae", c: "Lim", b_ref: 2.17124467967813 }, { g: "G1", n: "Odontoceridae", c: "Odon", b_ref: 2.70043875060649 },
        { g: "G1", n: "Philopotamidae", c: "Phil", b_ref: 2.90180975189982 }, { g: "G1", n: "Caenidae", c: "Caen", b_ref: 6.79008333117018 },
        { g: "G1", n: "Leptohyphidae", c: "Leptohy", b_ref: 6.70627109952791 }, { g: "G1", n: "Leptophlebiidae", c: "Leptoph", b_ref: 2.53027490635336 },
        { g: "G2", n: "Baetidae", c: "Baet", b_ref: 6.63354570520064 }, { g: "G1", n: "Coenagrionidae", c: "Coenagr", b_ref: 3.87543108019667 }, 
        { g: "G2", n: "Hydroptilidae", c: "Hydpt", b_ref: 5.91786955362542 }, { g: "G2", n: "Ceratopogonidae", c: "Cerato", b_ref: 4.05983030142959 },
        { g: "G2", n: "Chironomidae", c: "Chir", b_ref: 6.82596707974165 }, { g: "G2", n: "Simuliidae", c: "Simu", b_ref: 6.78970458200503 },
        { g: "G2", n: "Elmidae", c: "Elm", b_ref: 6.48381627409667 }, { g: "G2", n: "Staphylinidae", c: "Staph", b_ref: 3.85536300165374 },
        { g: "G2", n: "Tabanidae", c: "Tab", b_ref: 3.58543256868272 }, { g: "G3", n: "Curculionidae", c: "Curc", b_ref: 0.452865519467723 },
        { g: "G3", n: "Dytiscidae", c: "Dyt", b_ref: 2.39659172222833 }, { g: "G3", n: "Nematoda", c: "Nemat", b_ref: 0.0951969102893855 },
        { g: "G3", n: "Hirudinea", c: "Hirud", b_ref: 0.35114608780841 }, { g: "G3", n: "Annelida", c: "Anel", b_ref: 0.905224245443 },
        { g: "G3", n: "Ancylidae", c: "Ancy", b_ref: 0.298128388564839 }, { g: "G3", n: "Lymnaeidae", c: "Lymna", b_ref: 0.974435746045968 },
        { g: "G3", n: "Muscidae", c: "Musc", b_ref: 1.61776908382066 }, { g: "G4", n: "Helicopsychidae", c: "Hel", b_ref: 0.538703373569773 },
        { g: "G4", n: "Hydrobiosidae", c: "Hydbs", b_ref: 2.2254435974122 }, { g: "G4", n: "Culicidae", c: "Cul", b_ref: 0.366703186654392 },
        { g: "G4", n: "Empididae", c: "Emp", b_ref: 2.03504278580821 }, { g: "G4", n: "Ephydridae", c: "Ephy", b_ref: 0.0324504104219485 },
        { g: "G4", n: "Psychodidae", c: "Psych", b_ref: 1.46196485063943 }, { g: "G4", n: "Stratiomyidae", c: "Strat", b_ref: 0.0947081115859165 },
        { g: "G4", n: "Hydrophilidae", c: "Hidroph", b_ref: 2.17167598916964 }, { g: "G4", n: "Scirtidae", c: "Scir", b_ref: 0.541278343257515 },
        { g: "G4", n: "Belostomatidae", c: "Belos", b_ref: 0.372806300592704 }, { g: "G4", n: "Cicadellidae", c: "Cicad", b_ref: 0.311818787577659 },
        { g: "G4", n: "Lestidae", c: "Lest", b_ref: 0.554342812363059 }, { g: "G4", n: "Anisoptera", c: "Anis", b_ref: 0.702574879420639 },
        { g: "G4", n: "Crambidae", c: "Cram", b_ref: 1.49721061770454 }, { g: "G4", n: "Entomobryidae", c: "Entomo", b_ref: 1.75982931811588 },
        { g: "G4", n: "Crustacea", c: "Crust", b_ref: 0.358946435572115 }
    ];

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

    const grid = document.getElementById('taxa-content');
    ["G1", "G2", "G3", "G4"].forEach(g => {
        const col = document.createElement('div');
        col.className = 'col-lg-12';
        col.innerHTML = `<div class="card group-card group-header-${g}"><div class="card-body">
            <h6 class="fw-bold text-muted small mb-3">Grupo ${g}</h6>
            <div class="row g-1" id="grid-${g}"></div></div></div>`;
        grid.appendChild(col);
    });

    taxaData.forEach((t, i) => {
        const item = document.createElement('div');
        item.className = 'col-md-6';
        item.innerHTML = `<div class="taxa-input-group">
            <span class="taxa-code">${t.c}</span>
            <span class="taxa-name">${t.n}</span>
            <input type="number" class="form-control form-control-sm taxa-input" style="width: 75px;" data-idx="${i}" min="0">
        </div>`;
        document.getElementById(`grid-${t.g}`).appendChild(item);
    });

    function calculate() {
        let n_site = 0;
        let activeTaxas = 0;
        let inputs = document.querySelectorAll('.taxa-input');
        let dataEntries = [];

        inputs.forEach(inp => {
            let val = parseInt(inp.value) || 0;
            if (val > 0) {
                n_site += val;
                activeTaxas++;
                const item = taxaData[inp.dataset.idx];
                dataEntries.push({ val, b_ref: item.b_ref, group: item.g, name: item.n, code: item.c });
            }
        });

        if (n_site === 0) {
            updateUI(0, 0, { G1: 0, G2: 0, G3: 0, G4: 0 });
            return;
        }

        let n_efectiva = Math.round(n_site / activeTaxas);
        let sumaPi = 0;
        let familyResults = dataEntries.map(e => {
            let pi = 1 - hypergeom_0(n_efectiva, e.val, n_site);
            sumaPi += pi;
            return { ...e, pi };
        });

        let sumaDiferencias = 0;
        let bi_groups = { G1: 0, G2: 0, G3: 0, G4: 0 };

        familyResults.forEach(e => {
            let bi_site = 100 * (e.pi / sumaPi);
            bi_groups[e.group] += bi_site;
            sumaDiferencias += Math.abs(bi_site - e.b_ref);
        });

        taxaData.forEach(t => {
            if (!dataEntries.some(de => de.code === t.c)) {
                sumaDiferencias += t.b_ref;
            }
        });

        let pma_final = 100 - (0.5 * sumaDiferencias);
        updateUI(n_site, pma_final, bi_groups);
        window.lastResults = { n_site, pma_final, bi_groups, familyResults, n_efectiva };
    }

    function updateUI(n, score, bi_groups) {
        document.getElementById('total-n').textContent = n;
        document.getElementById('pma-score').textContent = score.toFixed(2);
        ["g1", "g2", "g3", "g4"].forEach(id => {
            document.getElementById(`p${id}`).textContent = bi_groups[id.toUpperCase()].toFixed(1) + "%";
        });

        const badge = document.getElementById('quality-badge');
        const interp = document.getElementById('interpretation-text');
        if (n === 0) {
            badge.textContent = "SIN DATOS"; badge.style.background = "#334155"; interp.textContent = "";
        } else {
            if (score >= 80) { badge.textContent = "EXCELENTE"; badge.style.background = "#198754"; interp.textContent = "Natural o muy cercana."; }
            else if (score >= 60) { badge.textContent = "BUENA"; badge.style.background = "#0dcaf0"; interp.textContent = "Ligera alteración."; }
            else if (score >= 40) { badge.textContent = "REGULAR"; badge.style.background = "#ffc107"; badge.style.color="#000"; interp.textContent = "Alteración moderada."; }
            else { badge.textContent = "MALA"; badge.style.background = "#dc3545"; interp.textContent = "Severamente degradada."; }
        }
    }

    async function exportPDF() {
        if (!window.lastResults || window.lastResults.n_site === 0) {
            alert("Ingrese datos antes de descargar."); return;
        }

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const res = window.lastResults;

        // Estilo de encabezado
        doc.setFillColor(7, 89, 133);
        doc.rect(0, 0, 210, 40, 'F');
        doc.setTextColor(255, 255, 255);
        doc.setFontSize(18);
        doc.text("REPORTE DE EVALUACIÓN PMA-SL", 14, 20);
        doc.setFontSize(10);
        doc.text(`Fecha: ${document.getElementById('input-fecha').value || 'N/A'} | Gestor: ${document.getElementById('input-gestor').value || 'N/A'}`, 14, 30);

        // Resultados Principales
        doc.setTextColor(0, 0, 0);
        doc.setFontSize(14);
        doc.text("RESULTADOS DEL SITIO", 14, 55);
        
        doc.autoTable({
            startY: 60,
            head: [['Puntaje PMA-SL', 'Estado de Calidad', 'Individuos (N)', 'Ab. Efectiva']],
            body: [[res.pma_final.toFixed(2), document.getElementById('quality-badge').textContent, res.n_site, res.n_efectiva]],
            theme: 'grid'
        });

        // Tabla de Grupos
        doc.text("COMPOSICIÓN POR GRUPOS (bi_site)", 14, doc.lastAutoTable.finalY + 15);
        doc.autoTable({
            startY: doc.lastAutoTable.finalY + 20,
            head: [['Grupo G1', 'Grupo G2', 'Grupo G3', 'Grupo G4']],
            body: [[
                res.bi_groups.G1.toFixed(2)+'%', 
                res.bi_groups.G2.toFixed(2)+'%', 
                res.bi_groups.G3.toFixed(2)+'%', 
                res.bi_groups.G4.toFixed(2)+'%'
            ]],
            theme: 'striped'
        });

        // Detalle de Familias
        doc.text("DETALLE DE FAMILIAS REGISTRADAS", 14, doc.lastAutoTable.finalY + 15);
        const tableData = res.familyResults.map(f => [f.group, f.name, f.val, f.b_ref.toFixed(4), (100 * (f.pi / res.familyResults.reduce((a,b)=>a+b.pi,0))).toFixed(2)]);
        
        doc.autoTable({
            startY: doc.lastAutoTable.finalY + 20,
            head: [['Grupo', 'Familia', 'Abundancia', 'Ref (b_ref)', 'Peso (bi_site)']],
            body: tableData,
        });

        doc.save(`PMA-SL_Reporte_${new Date().getTime()}.pdf`);
    }

    document.addEventListener('input', calculate);
    function resetAll() { if (confirm("¿Limpiar todo?")) { document.querySelectorAll('input').forEach(i => i.value = ""); calculate(); } }
</script>
</body>
</html>