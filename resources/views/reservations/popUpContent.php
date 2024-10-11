<?php
    $form_fields = json_encode($form->fields);
    $form_legatText = $form->LegalText;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if($form_fields): ?>
            <meta name="_fields" content="<?php echo htmlspecialchars($form_fields) ?>">
    <?php endif;?>
    <?php if($form_legatText): ?>
            <meta name="_legalText" content="<?php echo htmlspecialchars($form_legatText) ?>">
    <?php endif;?>
    <title>Formulario de inscripción</title>
    <link rel="stylesheet" href="/css/registerForm.css">
</head>
<body>
    <div class="home">
        <div class="header">
            <div class="header-container">
                <div class="row">
                    <p><?php echo htmlspecialchars($reservation->reservation_date)?></p>
                    <p><?php echo htmlspecialchars($reservation->ownerNameReservation).' '. htmlspecialchars($reservation->ownerSurnameReservation)?></p>
                </div>
                <div class="row"><p><?php echo htmlspecialchars($reservation->reservation_time)?></p>
                <p><?php echo htmlspecialchars($reservation->TotalPeople).' participantes' ?></p></div>
                <div class="row"><p style="text-transform: uppercase"><?php echo htmlspecialchars($reservation->Experience)?></p>
                <p>Español</p></div>
            </div>
        </div>
        <div class="home-container">
            <h3 style="text-transform:uppercase">Formulario de inscripción</h3>
            <form class="registerForm" action="">

            </form>
        </div>
    </div>
    <script src="/js/popUpRegisterForm.js"></script>
</body>
</html>
