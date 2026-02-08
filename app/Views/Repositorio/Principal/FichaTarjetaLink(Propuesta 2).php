<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Macroinvertebrados</title>
    <style>
        :root {
            --primary: #2c3e50;
            --accent: #27ae60; /* Color verde para indicar sensibilidad/naturaleza */
            --bg: #f4f7f6;
            --white: #ffffff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg);
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        /* Contenedor de la Tarjeta */
        .card {
            background: var(--white);
            width: 350px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Cabecera */
        .card-header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .title-area h2 {
            margin: 0;
            font-size: 1.4rem;
            color: var(--primary);
            letter-spacing: -0.5px;
        }

        .scientific-name {
            font-style: italic;
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-top: 4px;
        }

        .code-badge {
            background: var(--primary);
            color: white;
            padding: 5px 12px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 0.8rem;
        }

        /* Imagen */
        .image-container {
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: #eee;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Descripción */
        .card-body {
            padding: 20px;
        }

        .short-desc {
            font-size: 0.95rem;
            line-height: 1.5;
            color: #444;
            margin-bottom: 15px;
        }

        /* Desplegable (Detalles) */
        details {
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        summary {
            list-style: none;
            cursor: pointer;
            font-weight: 600;
            color: var(--accent);
            display: flex;
            justify-content: space-between;
            align-items: center;
            outline: none;
        }

        summary::after {
            content: '▼';
            font-size: 0.7rem;
            transition: 0.3s;
        }

        details[open] summary::after {
            transform: rotate(180deg);
        }

        .extra-info {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            margin-top: 10px;
            font-size: 0.85rem;
            color: #555;
        }

        .extra-info ul {
            margin: 0;
            padding-left: 18px;
        }

        .extra-info li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">
            <div class="title-area">
                <h2>Hydropsychidae</h2>
                <div class="scientific-name">Orden: Trichoptera</div>
            </div>
            <div class="code-badge">Hydsy</div>
        </div>

        <div class="image-container">
            <img src="" onerror="this.src='https://placehold.co/100x70?text=Hydropsychidae'" alt="Hydropsychidae">
        </div>

        <div class="card-body">
            <p class="short-desc">
                Larvas acuáticas conocidas como "tejedoras de redes". Son excelentes indicadores de la calidad del agua en ríos y arroyos.
            </p>

            <details>
                <summary>Ver info técnica</summary>
                <div class="extra-info">
                    <ul>
                        <li><strong>Hábito:</strong> Colector-filtrador. Construyen redes de seda para atrapar comida.</li>
                        <li><strong>Tolerancia:</strong> Valor de sensibilidad medio-alto (habitualmente 5-7).</li>
                        <li><strong>Morfología:</strong> Branquias abdominales ramificadas y penachos de pelos en las patas.</li>
                        <li><strong>Hábitat:</strong> Zonas de corriente rápida sobre sustrato rocoso.</li>
                    </ul>
                </div>
            </details>
        </div>
    </div>

</body>
</html>