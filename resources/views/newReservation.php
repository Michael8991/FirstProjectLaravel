<?php

    $experiencesData = $experiences

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reserva</title>
    <link rel="stylesheet" href="/css/newRegistration.css">
</head>
<body>
    <header>
        <h2>
            Crear reserva
        </h2>
    </header>
    <div class="home">
        <a class="btn" href="/registro"> < Volver</a>
        <form action="http://rgpddaw.test/AgregarReserva" method="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <label for="Name">Nombre:</label>
            <input type="text" id="name" name="Name" required><br><br>


            <label for="Surname">Apellidos:</label>
            <input type="text" id="surname" name="Surname" required><br><br>

            <label for="DNI">DNI:</label>
            <input type="string" id="dni" name="DNI" required><br><br>


            <label for="Experience">Experiencia:</label>
            <select id="experience" name="Experience" required>
                <option value="" disabled selected>Seleccione su experiencia</option>
                <?php foreach ($experiencesData as $experience): ?>
                    <option value="<?php echo $experience['id']; ?>">
                        <?php echo $experience['ExperienceName']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>


            <label for="TotalPeople">Cantidad de personas:</label>
            <input type="number" id="totalPeople" name="TotalPeople" min="1" required><br><br>


            <label for="Time">Hora:</label>
            <select id="time" name="Time" required>
                <option value="" disabled selected>Seleccione una hora</option>
                <option value="9:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
            </select><br><br>


            <label for="Date">Día:</label>
            <input type="date" id="date" name="Date" required><br><br>

            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
