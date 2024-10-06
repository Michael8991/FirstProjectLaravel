<?php
    $experienceData = $experience;
    $experienceName = $experienceData->ExperienceName
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    <meta name="experience_id" content="<?php echo $experienceData->id ?>">
    <?php if ($form): ?>
        <meta name="legalText-meta" content="<?php echo htmlspecialchars($form->LegalText); ?>">
        <meta name="form_id-meta" content="<?php echo htmlspecialchars($form->id); ?>">
    <?php endif; ?>
    <meta name="expName-meta" content="<?php echo htmlspecialchars($experienceData->ExperienceName); ?>">

    <title>Conf.<?=$experienceName?></title>
    <link rel="stylesheet" href="/css/show.css">
</head>
<body>
    <header>
        <div class="container">
            <h3>Configuracion de los campos legales para: "<?=$experienceName?>"</h3>
        </div>
    </header>
    <div class="wrap">
        <div class="container">
            <a class="btn-sec" href="/EditarFormulario/<?=$experienceData->id?>"> < Volver</a>
        </div>
        <div class="form-container">
        <?php if ($form): ?>
            <h2>Texto Legal asociado:</h2>

            <p><?php echo htmlspecialchars($form->LegalText); ?></p>
            <button class="btn" id="editForm" type="">Editar Textos Legales</button>
        <?php else: ?>
            <h2>No hay formulario asociado a esta experiencia.</h2>
            <button class="btn" id="addForm" type="">Agregar Textos Legales</button>
        <?php endif; ?>
        </div>
    </div>
    <script src="/js/legalTexts.js"></script>
</body>
</html>
