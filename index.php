
<?php
// 1. Mandamos llamar a tu archivo de conexión
require_once 'conexion.php';

// 2. Preparamos la consulta para traer los productos
$sql = "SELECT * FROM productos";
$stmt = $conexion->prepare($sql);
$stmt->execute();

// 3. Guardamos todos los resultados en una variable llamada $listaProductos
$listaProductos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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
            
            <?php foreach($listaProductos as $producto): ?>
                
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <!-- Imprimimos la URL de la imagen y el nombre -->
                        <img src="<?php echo $producto['imagen_url']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>" style="height: 250px; object-fit: cover;">
                        
                        <div class="card-body d-flex flex-column">
                            <!-- Imprimimos el nombre del producto -->
                            <h5 class="card-title fw-bold"><?php echo $producto['nombre']; ?></h5>
                            
                            <!-- Imprimimos la descripción -->
                            <p class="card-text text-muted"><?php echo $producto['descripcion']; ?></p>
                            
                            <!-- Imprimimos el precio -->
                            <h4 class="text-dark mb-4">$<?php echo $producto['precio']; ?> MXN</h4>
                            
                            <!-- Botón de WhatsApp -->
                            <a href="#" class="btn btn-success mt-auto fw-bold">Cotizar por WhatsApp</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

    <!-- Conexión a Bootstrap 5 (JavaScript para el menú en móviles) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>