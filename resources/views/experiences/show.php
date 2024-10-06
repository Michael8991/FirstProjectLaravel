<?php
    $experienceData = $experience
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conf. <?= htmlspecialchars($experienceData->ExperienceName) ?></title>
    <link rel="stylesheet" href="/css/show.css">
</head>
<body>
    <header>
        <div class="container">
            <h3>Configuración de la experiencia "<?= htmlspecialchars($experienceData->ExperienceName) ?>"</h3>
        </div>
    </header>
    <div class="wrap">
        <div class="container">
            <a class="btn-sec" href="/configuracion"> < Volver</a>
        </div>
        <div class="form-container">
            <form action="/experiences/store" method="POST" enctype="multipart/form-data">
                <div class="label-container">
                    <label for="experienceName">Nombre de la Experiencia:</label>
                    <input type="text" id="experienceName" name="ExperienceName" value="<?= htmlspecialchars($experienceData->ExperienceName) ?>"required>
                </div>
                <div class="label-container">

                </div>
                <div class="label-container">
                    <label for="logo">Logo de Empresa:</label>
                    <input type="file" id="logo" name="Logo" accept="image/*" required>
                </div>
                <div class="label-container">
                    <label for="image">Imagen de la Experiencia:</label>
                    <input type="file" id="image" name="Imagen" accept="image/*" required>
                </div>

                <div class="label-container">
                    <label for="theme">Tema:</label>
                    <select id="theme" name="Theme" required>
                        <option value="Dark">Oscuro</option>
                        <option value="Light">Claro</option>
                    </select>
                </div>

                <button class="btn" type="submit">Actualizar Experiencia</button>
            </form>
        </div>
    </div>
</body>
</html>
