<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Plataforma Artesanal</title>
    <!-- Conexión a Bootstrap 5 (CSS) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- 1. Menú de Navegación (Navbar) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Taller Artesanal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Catálogo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 2. Contenedor Principal del Catálogo -->
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Piezas Disponibles</h2>

        <!-- Cuadrícula (Grid) para acomodar los productos -->
        <div class="row">
            
            <!-- TARJETA DE PRODUCTO 1 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <!-- Imagen de muestra -->
                    <img src="./imagenes/vasija.jpg" class="card-img-top" alt="Cerámica" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Vasija de Barro Negro</h5>
                        <p class="card-text text-muted">Pieza de cerámica tradicional torneada a mano y horneada en leña. Ideal para interiores.</p>
                        <h4 class="text-dark mb-4">$450.00 MXN</h4>
                        <!-- Botón de WhatsApp (mt-auto lo empuja siempre hasta abajo) -->
                        <a href="#" class="btn btn-success mt-auto fw-bold">
                            Cotizar por WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- TARJETA DE PRODUCTO 2 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="./imagenes/reboso.jpg" class="card-img-top" alt="Textil" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Rebozo de Telar de Cintura</h5>
                        <p class="card-text text-muted">Tejido con hilos de algodón entintados con pigmentos naturales. Trabajo 100% artesanal.</p>
                        <h4 class="text-dark mb-4">$850.00 MXN</h4>
                        <a href="#" class="btn btn-success mt-auto fw-bold">
                            Cotizar por WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- TARJETA DE PRODUCTO 3 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="./imagenes/alebrije.jpg" class="card-img-top" alt="Madera" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Alebrije Tallado en Copal</h5>
                        <p class="card-text text-muted">Pieza única tallada en madera de copal y pintada a mano con un diseño vibrante.</p>
                        <h4 class="text-dark mb-4">$1,200.00 MXN</h4>
                        <a href="#" class="btn btn-success mt-auto fw-bold">
                            Cotizar por WhatsApp
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Conexión a Bootstrap 5 (JavaScript para el menú en móviles) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>