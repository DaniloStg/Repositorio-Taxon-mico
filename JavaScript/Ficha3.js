document.getElementById('organismoModal').addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;

    const nombre = button.getAttribute('data-nombre');
    const orden = button.getAttribute('data-orden');
    const codigo = button.getAttribute('data-codigo');
    const desc = button.getAttribute('data-descripcion');
    const habito = button.getAttribute('data-habito');
    const tolerancia = button.getAttribute('data-tolerancia');
    const morfologia = button.getAttribute('data-morfologia');
    const habitat = button.getAttribute('data-habitat');
    const imgsAttr = button.getAttribute('data-imgs') || "";
    const fotos = imgsAttr.split(',').filter(f => f.trim() !== "");

    let mediaHTML = "";
    if (fotos.length > 0) {
        // CORRECCIÓN: Eliminado object-fit: cover de aquí para que mande el CSS
        let carouselItems = fotos.map((foto, index) => `
            <div class="carousel-item ${index === 0 ? 'active' : ''}">
                <img src="${foto.trim()}" class="d-block w-100 zoomable-img" 
                     onclick="handleZoom(this)"
                     onmousemove="moveZoom(event, this)"
                     ontouchmove="moveZoom(event, this)"
                     onerror="this.src='https://placehold.co/400x250?text=Imagen+${index + 1}'">
            </div>`).join('');

        mediaHTML = `
            <div id="carouselOrganismo" class="carousel slide mb-4 shadow-sm rounded-4 overflow-hidden" data-bs-ride="false">
                <div class="carousel-inner">
                    ${carouselItems}
                </div>
                ${fotos.length > 1 ? `
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselOrganismo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon rounded-circle" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselOrganismo" data-bs-slide="next">
                    <span class="carousel-control-next-icon rounded-circle" aria-hidden="true"></span>
                </button>
                ` : ''}
            </div>`;
    }

    const modalBody = document.getElementById('modal-body-content');
    modalBody.innerHTML = `
        <div class="p-1">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h2 class="modal-title-main fw-bold mb-1" style="color: #1a1a1a;">${nombre}</h2>
                    <span class="order-tag">Orden: ${orden}</span>
                </div>
                <span class="code-badge-tech shadow-sm">${codigo}</span>
            </div>

            ${mediaHTML}

            <div class="card-body p-0">
                <p class="description-text mb-4">${desc}</p>
                <h6 class="fw-bold text-uppercase mb-3" style="font-size: 0.75rem; letter-spacing: 1px; color: #666;">
                    Especificaciones Técnicas
                </h6>
                <div class="tech-list">
                    <div class="tech-item"><strong>Hábito</strong><span>${habito}</span></div>
                    <div class="tech-item"><strong>Tolerancia</strong><span>${tolerancia}</span></div>
                    <div class="tech-item"><strong>Morfología</strong><span>${morfologia}</span></div>
                    <div class="tech-item"><strong>Hábitat</strong><span>${habitat}</span></div>
                </div>
            </div>
        </div>`;
});

// --- FUNCIONES DE ZOOM MEJORADAS ---

function handleZoom(img) {
    if (!img.classList.contains('img-enlarged')) {
        img.classList.add('img-enlarged');
        document.body.style.overflow = 'hidden';
    } 
    else if (!img.classList.contains('img-super-zoom')) {
        img.classList.add('img-super-zoom');
    } 
    else {
        img.classList.remove('img-enlarged', 'img-super-zoom');
        img.style.transformOrigin = 'center center';
        document.body.style.overflow = 'auto';
    }
}

let ticking = false;
function moveZoom(e, img) {
    if (img.classList.contains('img-super-zoom')) {
        // Evitar scroll en mobile
        if (e.cancelable) e.preventDefault();

        if (!ticking) {
            window.requestAnimationFrame(() => {
                let clientX, clientY;
                if (e.type.includes('touch')) {
                    clientX = e.touches[0].clientX;
                    clientY = e.touches[0].clientY;
                } else {
                    clientX = e.clientX;
                    clientY = e.clientY;
                }

                const rect = img.getBoundingClientRect();
                // Cálculo de precisión basado en el rectángulo actual de la imagen
                let xPercent = ((clientX - rect.left) / rect.width) * 100;
                let yPercent = ((clientY - rect.top) / rect.height) * 100;

                // Límites 0-100 para que no desaparezca la imagen
                xPercent = Math.max(0, Math.min(100, xPercent));
                yPercent = Math.max(0, Math.min(100, yPercent));

                img.style.transformOrigin = `${xPercent}% ${yPercent}%`;
                ticking = false;
            });
            ticking = true;
        }
    }
}