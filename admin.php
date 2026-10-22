<?php
require 'conexion.php';

$mensaje = "";

// 1. Guardar nueva categoría
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'crear_categoria') {
    $nombreCat = trim($_POST['nombre_categoria'] ?? '');
    $descCat = trim($_POST['descripcion_categoria'] ?? '');

    if (!empty($nombreCat)) {
        $sqlCatInsert = "INSERT INTO Categorias (nombre_categoria, descripcion_categoria) VALUES (:nombre, :descripcion)";
        $stmtCatInsert = $conexion->prepare($sqlCatInsert);
        if ($stmtCatInsert->execute([':nombre' => $nombreCat, ':descripcion' => $descCat])) {
            $mensaje = "<div class='alert alert-success fw-bold'>¡Categoría '$nombreCat' creada con éxito!</div>";
        } else {
            $mensaje = "<div class='alert alert-danger fw-bold'>Error al crear la categoría.</div>";
        }
    } else {
        $mensaje = "<div class='alert alert-warning fw-bold'>El nombre de la categoría es obligatorio.</div>";
    }
}

// 2. Guardar nuevo producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'crear_producto') {
    $nombre = trim($_POST['nombre_producto'] ?? '');
    $descripcion = trim($_POST['descripcion_producto'] ?? '');
    $precio = $_POST['precio'] ?? 0;
    $stock = $_POST['stock'] ?? 0;
    $imagen = trim($_POST['imagen_url'] ?? '');
    $categoria = $_POST['id_categoria'] ?? '';

    if (!empty($nombre) && !empty($precio) && !empty($categoria)) {
        $sqlProdInsert = "INSERT INTO Productos (nombre_producto, descripcion_producto, precio, stock, imagen_url, id_categoria) 
                          VALUES (:nombre, :descripcion, :precio, :stock, :imagen, :categoria)";
        $stmtProdInsert = $conexion->prepare($sqlProdInsert);
        if ($stmtProdInsert->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':stock' => $stock,
            ':imagen' => $imagen,
            ':categoria' => $categoria
        ])) {
            $mensaje = "<div class='alert alert-success fw-bold'>¡Artesanía '$nombre' guardada con éxito!</div>";
        } else {
            $mensaje = "<div class='alert alert-danger fw-bold'>Error al registrar el producto.</div>";
        }
    } else {
        $mensaje = "<div class='alert alert-warning fw-bold'>Por favor llena los campos obligatorios del producto.</div>";
    }
}

// Obtener todas las categorías registradas para el menú desplegable
$categorias = [];
if (isset($conexion)) {
    $stmtCatList = $conexion->query("SELECT Categorias.id_categoria, Categorias.nombre_categoria, Categorias.descripcion_categoria FROM Categorias ORDER BY Categorias.id_categoria DESC");
    $categorias = $stmtCatList->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración | Taller Artesanal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
</head>

<body style="padding-top: 100px;">

    <nav class="navbar navbar-expand-lg navbar-dark navbar-artesanal fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Taller Artesanal - ADMIN</a>
            <a href="index.php" class="btn btn-outline-light btn-sm ms-auto">Ver Catálogo Público →</a>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                
                <h2 class="fw-bold mb-1" style="color: #24201d;">Panel de Gestión de Inventario</h2>
                <p class="text-muted mb-4">Administra tus categorías y productos en tiempo real.</p>

                <?php echo $mensaje; ?>

                <div class="row g-4">
                    <!-- BLOQUE 1: AGREGAR CATEGORÍA -->
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm p-4 rounded-3 bg-white h-100">
                            <h4 class="fw-bold mb-3" style="color: #a96832;">1. Nueva Categoría</h4>
                            <form method="POST" action="admin.php">
                                <input type="hidden" name="accion" value="crear_categoria">

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nombre de la Categoría</label>
                                    <input type="text" name="nombre_categoria" class="form-control" placeholder="Ej. Vidrio Soplado, Platería, Cantería" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Descripción (Opcional)</label>
                                    <textarea name="descripcion_categoria" class="form-control" rows="3" placeholder="Breve descripción del oficio o técnica..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">
                                    + Crear Categoría
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- BLOQUE 2: AGREGAR PRODUCTO -->
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm p-4 rounded-3 bg-white h-100">
                            <h4 class="fw-bold mb-3" style="color: #a96832;">2. Registrar Producto</h4>
                            <form method="POST" action="admin.php">
                                <input type="hidden" name="accion" value="crear_producto">

                                <div class="row">
                                    <div class="col-md-7 mb-3">
                                        <label class="form-label fw-bold">Nombre de la artesanía</label>
                                        <input type="text" name="nombre_producto" class="form-control" placeholder="Ej. Jarrón de Piedra Cantera" required>
                                    </div>

                                    <div class="col-md-5 mb-3">
                                        <label class="form-label fw-bold">Seleccionar Categoría</label>
                                        <select name="id_categoria" class="form-select" required>
                                            <option value="">Selecciona una categoría...</option>
                                            <?php foreach ($categorias as $cat): ?>
                                                <option value="<?php echo $cat['id_categoria']; ?>">
                                                    <?php echo htmlspecialchars($cat['nombre_categoria']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Descripción detallada</label>
                                    <textarea name="descripcion_producto" class="form-control" rows="3" placeholder="Describe los materiales, técnica artesanal, dimensiones..." required></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Precio ($ MXN)</label>
                                        <input type="number" step="0.01" name="precio" class="form-control" placeholder="0.00" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Stock</label>
                                        <input type="number" name="stock" class="form-control" placeholder="1" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Ruta / Nombre de Imagen</label>
                                        <input type="text" name="imagen_url" class="form-control" placeholder="./imagenes/mi_foto.jpg" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-artesanal w-100 mt-2 py-2 fw-bold" <?php if (empty($categorias)) echo 'disabled'; ?>>
                                    Guardar y Publicar Artesanía
                                </button>
                                <?php if (empty($categorias)): ?>
                                    <small class="text-danger d-block mt-2 text-center">Crea al menos una categoría a la izquierda para habilitar la publicación de productos.</small>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>