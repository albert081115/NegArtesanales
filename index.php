<?php require 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Taller Artesanal | Artesanías Mexicanas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <!-- ==================== NAVBAR ==================== -->

    <nav class="navbar navbar-expand-lg navbar-dark navbar-artesanal fixed-top">

        <div class="container">

            <a class="navbar-brand fw-bold" href="#inicio">
                Taller Artesanal
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#categorias">Categorías</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#productos">Productos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- ==================== INICIO ==================== -->

    <header id="inicio" class="hero-artesanal">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-7">

                    <span class="hero-etiqueta">
                        ARTESANÍA MEXICANA
                    </span>

                    <h1>
                        Tradición y creatividad
                        <span>en cada pieza</span>
                    </h1>

                    <p>
                        Descubre productos elaborados a mano por artesanos,
                        conservando técnicas tradicionales y diseños únicos.
                    </p>

                    <div class="hero-botones">

                        <a href="#productos" class="btn btn-artesanal">
                            Ver productos
                        </a>

                        <a href="#nosotros" class="btn btn-outline-light">
                            Conócenos
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </header>


    <!-- ==================== NOSOTROS ==================== -->

    <section id="nosotros" class="seccion-nosotros">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6 mb-4 mb-lg-0">

                    <span class="seccion-etiqueta">
                        SOBRE NOSOTROS
                    </span>

                    <h2>
                        Artesanía con identidad
                    </h2>

                    <p>
                        Nuestro proyecto busca apoyar la difusión y
                        comercialización de productos artesanales,
                        mostrando el trabajo y la creatividad detrás
                        de cada pieza.
                    </p>

                    <p>
                        Cada producto representa parte de la cultura,
                        tradición y conocimiento de los artesanos que
                        participan en su elaboración.
                    </p>

                    <a href="#contacto" class="btn btn-dark">
                        Conoce nuestro trabajo
                    </a>

                </div>

                <div class="col-lg-6">

                    <div class="nosotros-contenedor">

                        <img src="./imagenes/alebrije.jpg"
                            alt="Artesanía mexicana">

                    </div>

                </div>

            </div>

        </div>

    </section>


 <!-- ==================== CATEGORÍAS ==================== -->
<section id="categorias" class="seccion-categorias">

    <div class="container">

        <div class="text-center mb-5">
            <span class="seccion-etiqueta">EXPLORA</span>
            <h2>Nuestras categorías</h2>
            <p>Conoce algunas de las principales áreas de trabajo artesanal.</p>
        </div>

        <div class="row g-4">
            <?php
            if (isset($conexion)) {
                $sqlCatIndex = "SELECT Categorias.id_categoria, Categorias.nombre_categoria, Categorias.descripcion_categoria FROM Categorias";
                $stmtCatIndex = $conexion->query($sqlCatIndex);
                $categoriasIndex = $stmtCatIndex->fetchAll(PDO::FETCH_ASSOC);

                foreach ($categoriasIndex as $catItem) {
            ?>
            <div class="col-md-4">
                <div class="categoria-card">
                    <div class="categoria-icono">🎨</div>
                    <h4><?php echo htmlspecialchars($catItem['nombre_categoria']); ?></h4>
                    <p><?php echo htmlspecialchars($catItem['descripcion_categoria']); ?></p>
                    <a href="#productos">Ver productos →</a>
                </div>
            </div>
            <?php 
                }
            } 
            ?>
        </div>

    </div>

</section>  

    <!-- ==================== PRODUCTOS ==================== -->

    <section id="productos" class="seccion-productos">

        <div class="container">

            <div class="text-center mb-5">

                <span class="seccion-etiqueta">
                    CATÁLOGO
                </span>

                <h2>
                    Productos destacados
                </h2>

                <p>
                    Conoce algunas de las piezas disponibles.
                </p>

            </div>


            <div class="row g-4">
    <?php
    $sql = "SELECT Productos.id_producto, Productos.nombre_producto, Productos.descripcion_producto, Productos.precio, Productos.imagen_url, Categorias.nombre_categoria FROM Productos INNER JOIN Categorias ON Productos.id_categoria = Categorias.id_categoria";
    $stmt = $conexion->query($sql);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($productos as $producto) {
        $numeroWhatsApp = "5215555555555"; 
        $mensajeBase = "Hola, me interesa cotizar el producto: " . $producto['nombre_producto'];
        $enlaceWhatsApp = "https://wa.me/" . $numeroWhatsApp . "?text=" . urlencode($mensajeBase);
    ?>
    <div class="col-md-6 col-lg-4">
        <div class="producto-card">
            <div class="producto-imagen">
                <img src="<?php echo htmlspecialchars($producto['imagen_url']); ?>" alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>">
                <span class="producto-categoria">
                    <?php echo htmlspecialchars($producto['nombre_categoria']); ?>
                </span>
            </div>
            <div class="producto-contenido">
                <h4><?php echo htmlspecialchars($producto['nombre_producto']); ?></h4>
                <p><?php echo htmlspecialchars($producto['descripcion_producto']); ?></p>
                <div class="producto-pie">
                    <strong>$<?php echo number_format($producto['precio'], 2); ?> MXN</strong>
                    <a href="<?php echo $enlaceWhatsApp; ?>" target="_blank" class="btn btn-sm btn-artesanal">
                        Cotizar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>


    <!-- ==================== PROCESO ==================== -->

    <section class="seccion-proceso">

        <div class="container">

            <div class="text-center mb-5">

                <span class="seccion-etiqueta">
                    NUESTRO TRABAJO
                </span>

                <h2>
                    Proceso artesanal
                </h2>

                <p>
                    Cada pieza pasa por diferentes etapas antes de llegar al cliente.
                </p>

            </div>


            <div class="row g-4">

                <div class="col-md-3">

                    <div class="proceso-card">

                        <div class="proceso-numero">
                            01
                        </div>

                        <h4>
                            Diseño
                        </h4>

                        <p>
                            Se define la idea y características de la pieza.
                        </p>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="proceso-card">

                        <div class="proceso-numero">
                            02
                        </div>

                        <h4>
                            Elaboración
                        </h4>

                        <p>
                            El artesano trabaja la materia prima de forma manual.
                        </p>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="proceso-card">

                        <div class="proceso-numero">
                            03
                        </div>

                        <h4>
                            Acabado
                        </h4>

                        <p>
                            Se realizan los detalles finales y la decoración.
                        </p>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="proceso-card">

                        <div class="proceso-numero">
                            04
                        </div>

                        <h4>
                            Entrega
                        </h4>

                        <p>
                            La pieza queda lista para llegar al cliente.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ==================== CONTACTO ==================== -->

    <section id="contacto" class="seccion-contacto">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-7">

                    <span class="seccion-etiqueta">
                        CONTACTO
                    </span>

                    <h2>
                        ¿Te interesa alguna pieza?
                    </h2>

                    <p>
                        Ponte en contacto con nosotros para conocer
                        disponibilidad, precios y opciones de pedido.
                    </p>

                </div>

                <div class="col-lg-5 text-lg-end">

                    <!-- Más adelante pondremos aquí el número real -->

                    <a href="#" class="btn btn-whatsapp">
                        Cotizar por WhatsApp
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- ==================== FOOTER ==================== -->

    <footer class="footer-artesanal">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <h5>
                        Taller Artesanal
                    </h5>

                    <p>
                        Plataforma para la difusión y comercialización
                        de productos artesanales.
                    </p>

                </div>


                <div class="col-md-3">

                    <h6>
                        Navegación
                    </h6>

                    <a href="#inicio">Inicio</a>
                    <a href="#productos">Productos</a>
                    <a href="#nosotros">Nosotros</a>
                    <a href="#contacto">Contacto</a>

                </div>


                <div class="col-md-3">

                    <h6>
                        Información
                    </h6>

                    <p>
                        Artesanías mexicanas
                    </p>

                    <p>
                        Atención personalizada
                    </p>

                </div>

            </div>


            <hr>

            <div class="text-center">

                <small>
                    © 2026 Taller Artesanal | Proyecto académico
                </small>

            </div>

        </div>

    </footer>


    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>