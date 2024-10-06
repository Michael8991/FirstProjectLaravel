<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    <div class="container">
        <div class="menu">
            <?php foreach ($experiences as $experience): ?>
                <a class="btn" data-id="<?php echo htmlspecialchars($experience->id); ?>" href="">
                    <?php echo htmlspecialchars($experience->ExperienceName); ?>
                </a>
            <?php endforeach; ?>
            <div class="row">
                <a class="btn-sec" href="/">< Volver</a>
                <a class="btn-sec" href="/NuevaExperiencia"> Crear Experiencia ></a>
            </div>
        </div>
    </div>
</body>
    <script src="/js/drop-down.js"></script>
</html>
