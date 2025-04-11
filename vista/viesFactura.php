<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal de Factura</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .invoice-modal {
            max-width: 600px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h2 {
            margin: 0;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-footer {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#invoiceModal">
    Ver Factura
</button>

<!-- Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered invoice-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="invoiceModalLabel">Factura de Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="invoice-header">
                    <h2>Nombre de la Empresa</h2>
                    <p>Dirección de la Empresa</p>
                    <p>Teléfono: (123) 456-7890</p>
                </div>
                <div class="invoice-details">
                    <p><strong>Cliente:</strong> Nombre del Cliente</p>
                    <p><strong>Fecha:</strong> 01/01/2023</p>
                    <p><strong>Número de Factura:</strong> 001234</p>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Producto 1</td>
                            <td>2</td>
                            <td>$10.00</td>
                            <td>$20.00</td>
                        </tr>
                        <tr>
                            <td>Producto 2</td>
                            <td>1</td>
                            <td>$15.00</td>
                            <td>$15.00</td>
                        </tr>
                    </tbody>
                </table>
                <div class="invoice-footer">
                    <h5>Total: $35.00</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Imprimir</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>