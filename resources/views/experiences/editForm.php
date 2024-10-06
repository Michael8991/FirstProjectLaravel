<?php
    $experienceData = $experience
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form. <?= htmlspecialchars($experienceData->ExperienceName) ?></title>
    <link rel="stylesheet" href="/css/show.css">
</head>
<body>
    <header>
        <div class="container">
            <h3>Configuración del formulario para la experiencia: "<?= htmlspecialchars($experienceData->ExperienceName) ?>"</h3>
        </div>
    </header>
    <div class="wrap">
        <div class="container">
            <a class="btn-sec" href="/configuracion"> < Volver</a>
        </div>
        <div class="form-container">
                <a class="btn" href="/TextosLegales/<?=$experienceData->id?>">Textos Legales</a>
                <a class="btn" href="/Campos/<?=$experienceData->id?>">Campos</a>
        </div>
    </div>
</body>
</html>
