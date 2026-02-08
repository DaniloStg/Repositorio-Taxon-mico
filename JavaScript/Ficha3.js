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
    const imgUrl = button.getAttribute('data-img');

    const modalBody = document.getElementById('modal-body-content');

    modalBody.innerHTML = `
        <div class="p-2">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h2 class="modal-title-main fw-bold mb-1">${nombre}</h2>
                    <span class="order-tag">Orden: ${orden}</span>
                </div>
                <span class="code-badge-tech shadow-sm">${codigo}</span>
            </div>

            <div class="img-frame text-center mb-4 shadow-sm">
                <img src="${imgUrl}" class="img-fluid rounded" style="max-height: 250px; object-fit: contain;" 
                     onerror="this.src='https://placehold.co/400x250?text=${nombre}'">
            </div>

            <div class="card-body p-0">
                <p class="description-text mb-4">
                    ${desc}
                </p>

                <h6 class="fw-bold text-uppercase mb-3" style="font-size: 0.75rem; letter-spacing: 1px; color: #000;">
                    Especificaciones Técnicas
                </h6>
                
                <ul class="tech-list list-unstyled">
                    <li class="tech-item">
                        <strong>Hábito</strong>
                        <span>${habito}</span>
                    </li>
                    <li class="tech-item">
                        <strong>Tolerancia</strong>
                        <span>${tolerancia}</span>
                    </li>
                    <li class="tech-item">
                        <strong>Morfología</strong>
                        <span>${morfologia}</span>
                    </li>
                    <li class="tech-item">
                        <strong>Hábitat</strong>
                        <span>${habitat}</span>
                    </li>
                </ul>
            </div>
        </div>
    `;
});