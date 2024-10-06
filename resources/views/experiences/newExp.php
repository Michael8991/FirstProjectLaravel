<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nueva experiencia</title>
    <link rel="stylesheet" href="/css/show.css">
</head>
<body>
    <header>
        <div class="container">
            <h3>Formulario para la creación de experiencia</h3>
        </div>
    </header>
    <div class="wrap">
        <div class="container">
            <a class="btn-sec" href="/configuracion"> < Volver</a>
        </div>
        <div class="form-container">
            <form action="/StoreExperience" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="label-container">
                    <label for="experienceName">Nombre de la Experiencia:</label>
                    <input type="text" id="experienceName" name="ExperienceName" required>
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

                <button class="btn" type="submit">Agregar Experiencia</button>
            </form>
        </div>
    </div>
</body>
</html>
