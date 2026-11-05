	<?php

enum CategoriaProducto: string {
    case Comida = 'Alimentos y Aperitivos';
    case Bebida = 'Bebidas Refrescantes';
}

class ProductoTienda {
    public function __construct(
        public string $nombre,
        public float $precio,
        public CategoriaProducto $cat
    ) {}
}

$resNamespace = "";
$resEnum = "";
$resError = "";
$resFiber = "";
$resGenerador = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Modularización y clases
    if (isset($_POST['probar_namespace'])) {
        $item = new ProductoTienda(
            'HAMBURGUESA DEL PERU',
            47500.00,
            CategoriaProducto::Comida
        );

        $resNamespace = "Producto cargado correctamente: "
            . $item->nombre
            . " - Precio: $"
            . number_format($item->precio, 0, ',', '.')
            . " - Categoría: "
            . $item->cat->value;
    }

    // 2. Enumeraciones
    if (isset($_POST['probar_enum'])) {
        $cat = CategoriaProducto::Comida;
        $resEnum = "Categoría validada por Enum: " . $cat->value;
    }

    // 3. Manejo de errores
    if (isset($_POST['probar_error'])) {
        $stock = filter_input(INPUT_POST, 'stock_actual', FILTER_VALIDATE_INT);
        $pedido = filter_input(INPUT_POST, 'cantidad_pedida', FILTER_VALIDATE_INT);

        if ($stock === false || $stock === null ||
            $pedido === false || $pedido === null ||
            $stock < 0 || $pedido < 0) {

            $resError = "Error: ingresa cantidades enteras válidas y no negativas.";

        } else {
            try {
                if ($pedido > $stock) {
                    throw new Exception(
                        "Stock insuficiente. Hay {$stock} unidades y pediste {$pedido}."
                    );
                }

                $resError = "Venta procesada con éxito. Quedan "
                    . ($stock - $pedido)
                    . " unidades.";

            } catch (Exception $e) {
                $resError = "Error controlado atrapado: " . $e->getMessage();
            }
        }
    }

    // 4. Fibers
    if (isset($_POST['probar_fiber'])) {
        $monto = filter_input(INPUT_POST, 'monto_pago', FILTER_VALIDATE_FLOAT);

        if ($monto === false || $monto === null || $monto < 0) {
            $resFiber = "Ingresa un monto válido y no negativo.";
        } else {
            $procesadorPago = new Fiber(function (float $valor): string {
                Fiber::suspend(
                    "Procesando pago de $" .
                    number_format($valor, 0, ',', '.') .
                    ". Esperando confirmación..."
                );

                return "Transacción aprobada y verificada.";
            });

            $estado1 = $procesadorPago->start($monto);
            $procesadorPago->resume();
            $estado2 = $procesadorPago->getReturn();

            $resFiber = $estado1 . " | " . $estado2;
        }
    }

    // 5. Generadores
    if (isset($_POST['probar_gen'])) {
        $generarReporte = static function (): Generator {
            yield "Venta #001 - HAMBURGUESA (Total: $47.500)";
            yield "Venta #002 - COCA COLA ZERO (Total: $3.000)";
            yield "Venta #003 - SALSA EXTRA (Total: $1.000)";
        };

        foreach ($generarReporte() as $venta) {
            $resGenerador[] = $venta;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller PHP</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
            padding: 20px;
            color: #334155;
            max-width: 900px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            background: linear-gradient(135deg, #50c878, #14ad83);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-left: 5px solid #50c878;
        }

        h3 {
            color: #1e293b;
            margin-top: 0;
        }

        .box {
            background: #f1f7fa;
            border: 1px solid #38bdf8;
            padding: 10px;
            border-radius: 5px;
            font-family: monospace;
            margin-top: 10px;
            overflow-wrap: anywhere;
        }

        button {
            background: #4f46e5;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 8px;
        }

        button:hover {
            background: #14ad83;
        }

        input {
            padding: 6px;
            border: 1px solid #cbd5e1;
            margin: 5px 10px 5px 0;
            max-width: 100%;
        }
    </style>
</head>

<body>

<header>
    <h1>EJERCICIO EXPOSICIÓN HAMBURGUESA DE TEMU</h1>
    <p>¡LOS 5 PRIMEROS GANAN!</p>
</header>

<div class="card">
    <h3>1. Modularización y Clases</h3>
    <p>Carga una clase de producto simulando el módulo de inventarios:</p>

    <form method="POST">
        <button type="submit" name="probar_namespace">Ejecutar Clase</button>
    </form>

    <?php if ($resNamespace !== ""): ?>
        <div class="box"><?= htmlspecialchars($resNamespace, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>
</div>

<div class="card">
    <h3>2. Enumeraciones (Enums)</h3>
    <p>Valida los tipos fijos de categorías permitidas en el sistema:</p>

    <form method="POST">
        <button type="submit" name="probar_enum">Consultar Enum</button>
    </form>

    <?php if ($resEnum !== ""): ?>
        <div class="box"><?= htmlspecialchars($resEnum, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>
</div>

<div class="card">
    <h3>3. Manejo de Errores (Try / Catch)</h3>
    <p>Prueba el control de stock. Si pides más de lo disponible, aparecerá un error controlado:</p>

    <form method="POST">
        <label>
            Stock disponible:
            <input type="number" name="stock_actual" value="10" min="0" required>
        </label>

        <label>
            Cantidad a pedir:
            <input type="number" name="cantidad_pedida" value="5" min="0" required>
        </label>

        <button type="submit" name="probar_error">Validar Inventario</button>
    </form>

    <?php if ($resError !== ""): ?>
        <div class="box"><?= htmlspecialchars($resError, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>
</div>

<div class="card">
    <h3>4. Fibers (Concurrencia cooperativa)</h3>
    <p>Simula una pasarela de pago ingresando un monto:</p>

    <form method="POST">
        <label>
            Monto:
            <input type="number" name="monto_pago" value="15000" min="0" step="0.01" required>
        </label>

        <button type="submit" name="probar_fiber">Procesar Pago</button>
    </form>

    <?php if ($resFiber !== ""): ?>
        <div class="box"><?= htmlspecialchars($resFiber, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>
</div>

<div class="card">
    <h3>5. Generadores (Yield)</h3>
    <p>Genera un reporte de transacciones de caja:</p>

    <form method="POST">
        <button type="submit" name="probar_gen">Generar Reporte</button>
    </form>

    <?php if (!empty($resGenerador)): ?>
        <div class="box">
            <?php foreach ($resGenerador as $linea): ?>
                <?= htmlspecialchars($linea, ENT_QUOTES, 'UTF-8') ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>