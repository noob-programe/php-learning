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

    if (isset($_POST['probar_namespace'])) {
        $item = new ProductoTienda(
            'HAMBURGUESA DEL PERU',
            47500.00,
            CategoriaProducto::Comida
        );

        $resNamespace .= "Cargado correctamente: {$item->nombre} - Valor: \${$item->precio}";
    }

    if (isset($_POST['probar_enum'])) {
        $cat = CategoriaProducto::Comida;
        $resEnum = "Categoría fija validada por Enum: " . $cat->value;
    }

    if (isset($_POST['probar_error'])) {
        $stock = intval($_POST['stock_actual']);
        $pedido = intval($_POST['cantidad_pedida']);

        try {
            if ($pedido > $stock) {
                throw new Exception(
                    "Stock insuficiente! Hay {$stock} unidades y pediste {$pedido}."
                );
            }

            $resError = "Venta procesada con éxito. Quedan " .
                ($stock - $pedido) . " unidades.";

        } catch (\Exception $e) {
            $resError = "Error controlado atrapado: " . $e->getMessage();
        }
    }

    if (isset($_POST['probar_fiber'])) {
        $monto = floatval($_POST['monto_pago']);

        $procesadorPago = new \Fiber(function (float $val): void {
            echo "Iniciando proceso...";
            \Fiber::suspend("Procesando pago de \${$val}. Esperando...");
        });

        $estado1 = $procesadorPago->start($monto);
        $estado2 = $procesadorPago->resume(
            "Transacción aprobada y verificada!"
        );

        $resFiber = "Paso 1: {$estado1} | Paso 2: Transacción aprobada para \${$monto}";
    }

    if (isset($_POST['probar_gen'])) {
        function GenerarReporteDinamico() {
            yield "Venta #001 - HAMBURGUESA (Total: $47.500)";
            yield "Venta #002 - COCA COLA ZERO (Total: $63.000)";
            yield "Venta #003 - SALSA EXTRA (Total: $1.000)";
        }

        foreach (GenerarReporteDinamico() as $v) {
            $resGenerador[] = $v;
        }
    }
}
?>