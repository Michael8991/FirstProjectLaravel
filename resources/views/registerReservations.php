<?php
    $reservationsData = $reservations
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de reservas</title>
    <link rel="stylesheet" href="/css/register.css">
</head>
<body>
    <header>
        <h2>
            Registro de reservas
        </h2>
    </header>
    <div class="home">
        <div class="home-header">
            <div class="home-header-wrapper">
                <div class="order-operation-wrap">
                    <a href="/registro" class="btn btn-primary">Ordenar por registro individual</a>
                </div>
                <div class="browser-wrap">
                    <a href="/registroReservasPasadas" class="btn btn-info">Anteriores</a>
                    <a href="/registroReservasHoy" class="btn btn-success">Hoy</a>
                    <a href="/registroReservasFuturas" class="btn btn-danger">Futuras</a>
                </div>
                <div class="operation-wrap">
                    <a href="/NuevaReserva" class="btn btn-success">Agregar</a>
                    <a id="deleteRegisterBtn" href="" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
        <div class="home-content" style="display:flex">
            <div class="delete-searcher-container">

            </div>
            <h3 style="margin:10px auto;">Todos los registros</h3>
            <?php foreach ($reservationsData as $reservation): ?>
                <a class="row-a" href="">
                    <table>
                        <tr>
                            <th><?php echo $reservation['reservation_time']; ?></th>
                            <th><?php echo $reservation['reservation_date']; ?></th>
                            <th><?php echo $reservation['Experience']; ?></th>
                            <th><?php echo $reservation['ownerNameReservation']." ". $reservation['ownerSurnameReservation']; ?></th>
                            <th><?php echo $reservation['TotalPeople']; ?> personas</th>
                            <th>
                                <a class="btn-info" href="">Copiar Enlace</a>
                                <a class="btn-info" href="">Enviar Whatsapp</a>
                                <a class="btn-info" href="">Enviar Correo</a>
                            </th>
                        </tr>
                    </table>
                </a>
            <?php endforeach; ?>
        </div>

        <div>
        <?php if ($reservations->hasPages()): ?>
            <nav>
                <ul class="pagination">
                    <?php if ($reservations->onFirstPage()): ?>
                        <li class="disabled"><span>&laquo; Anterior</span></li>
                    <?php else: ?>
                        <li><a href="<?php echo $reservations->previousPageUrl(); ?>">&laquo; Anterior</a></li>
                    <?php endif; ?>

                    <?php foreach ($reservations->getUrlRange(1, $reservations->lastPage()) as $page => $url): ?>
                        <?php if ($page == $reservations->currentPage()): ?>
                            <li class="active"><span><?php echo $page; ?></span></li>
                        <?php else: ?>
                            <li><a href="<?php echo $url; ?>"><?php echo $page; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php if ($reservations->hasMorePages()): ?>
                        <li><a href="<?php echo $reservations->nextPageUrl(); ?>">Siguiente &raquo;</a></li>
                    <?php else: ?>
                        <li class="disabled"><span>Siguiente &raquo;</span></li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
    </div>
    <script src="/js/deleteRegister.js"></script>
</body>
</html>
