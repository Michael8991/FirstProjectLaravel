<?php
    $experienceData = $experience;
    if($form){
        $formData = $form;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Campos <?php echo $experienceData->ExperienceName?> </title>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="<?php echo csrf_token() ?>">
        <meta name="form_id" content="<?php echo $formData->id ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/fields.css" rel="stylesheet">
    </head>
    <body>
    <header>
        <div class="container">
            <h3>Configuracion de los campos legales para: "<?=$experienceData->ExperienceName?>"</h3>
        </div>
    </header>
    <div class="wrap">
        <div class="container">
            <a class="btn-sec" href="/EditarFormulario/<?=$experienceData->id?>"> < Volver</a>
        </div>
        <div class="form-container">
        <?php if ($form && $fields): ?>
            <h2>Campos asociado:</h2>
            <button class="btn" id="editForm" type="">Editar Campos</button>
        <?php elseif($form && !$fields): ?>
            <h3>Existe un formulario pero sin campos creados.</h3>
            <button class="btn" id="addFields" type="">Agregar Campos</button>
        <?php else:?>
            <h3>No existe formulario para esta experiencia.</h3>
            <button class="btn" id="addForm" type="">Crear Formulario</button>
        <?php endif; ?>
        </div>
    </div>
    <script src="/js/fields.js"></script>
</body>
</html>
