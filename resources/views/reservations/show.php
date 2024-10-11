<?php
    $dataCount = 0;
    if($reservationData):
        $dataCount = $reservationData->count();
    endif;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción</title>
    <link rel="stylesheet" href="/css/showRegister.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h3>Inscripción de participantes</h3>
        </div>
    </header>
    <div class="home">
        <div class="home-container">
            <table class="registration-table">
                <thead>
                    <tr>
                        <td>Participante</td>
                        <td>Nombre</td>
                        <td>DNI</td>
                        <td>Firma</td>
                    </tr>
                </thead>
                <tbody>
                <?php for($size = 0; $size< $reservation->TotalPeople; $size++):?>
                    <tr>
                    <?php $size2=$size+1;
                    if($size < $dataCount):
                        // foreach($reservationData as $data):
                        ?>
                            <td style="text-align:center;"><?php echo $size2?>.</td>
                            <td><?php echo $reservationData[$size]['Name'].' '.$reservationData[$size]['Surname']?></td>
                            <td><?php echo $reservationData[$size]['DNI']?></td>
                            <td><?php echo $reservationData[$size]['firma']?><button class="firma-btn" onclick="openPopup(<?php echo $reservationData[$size]['id']?>)">Ver</button></td>
                        <?php
                        // endforeach;
                        ?>
                    <?php else:?>
                        <td style="text-align:center;"><?php echo $size2?>.</td>
                        <td style="text-align:center;"  colspan=2>No hay mas datos</td>
                        <td><button class="firma-btn" onclick="openPopupUnregisterFormf()">Ver</button></td>
                    <?php endif;?>
                    </tr>
                <?php endfor;?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="/js/popUpRegisterForm.js"></script>
</body>
</html>
