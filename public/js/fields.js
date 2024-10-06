const addForm = document.getElementById('addForm');
const editForm =  document.getElementById('editForm');
const addFields  = document.getElementById('addFields');

const formContainer = document.querySelector('.form-container')

const form_id = document.querySelector('meta[name="form_id"]').getAttribute('content')
const csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
let contador = 0;

addFields.addEventListener('click', ()=>{
    formContainer.innerHTML = ``
    formContainer.innerHTML = `
    <form action="" method="post">
        <h3>Campos básicos:</h3>
        <div class="label-container">
            <label for="DNI">DNI: </label>
            <input type="text" name="DNI" id="dni" value="DNI" class="input-readonly" readonly disabled>
            <p class="mandatory-input">Este campo será obligatorio</p>
        </div>
        <div class="label-container">
            <label for="Name">Nombre: </label>
            <input type="text" name="Name" id="name" value="Nombre" class="input-readonly" readonly disabled>
            <p class="mandatory-input">Este campo será obligatorio</p>
        </div>
        <div class="label-container">
            <label for="Surame">Apellidos: </label>
            <input type="text" name="Surname" id="surname" value="Apellidos" class="input-readonly" readonly disabled>
        </div>
        <h3>Campos personalizados</h3>
        <table class="dinamics-inputs-table">
            <thead>
                <tr>
                    <th>Datos</th>
                    <th>Sí/No</th>
                    <th>¿Es obligatorio?</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Télefono</td>
                    <td><input type="checkbox" name="PhoneNumber" id="phoneNumber"></td>
                    <td><input type="checkbox" name="PhoneNumberMandatory" id="phoneNumberMandatory"></td>
                </tr>
                <tr>
                    <td>Correo electrónico</td>
                    <td><input type="checkbox" name="Email" id="email"></td>
                    <td><input type="checkbox" name="EmailMandatory" id="emailMandatory"></td>
                </tr>
                <tr>
                    <td>Redes sociales</td>
                    <td><input type="checkbox" name="SocialNetwork" id="socialNetwork"></td>
                    <td><input type="checkbox" name="SocialMediaMandatory" id="socialMediaMandatory"></td>
                </tr>
                <tr>
                    <td>Campo personalizado</td>
                    <td><input type="text" name="CustomInput" id="customInput" placeholder="Agregar campo..."></td>
                    <td><input type="checkbox" name="CustomInputMandatory" id="CustomInputMandatory" ></td>
                </tr>
            </tbody>
        </table>
        <div class="label-container">
            <h3>Otros campos personalizados</h3>
            <button class="add-input-btn" onclick="addCustomInput(event)">Agregar</button>
        </div>

        <div class="customs-inputs-div">
            <p>No hay campos personalizados</p>
        </div>

        <button type="submit" class="btn">Crear formulario</button>
    </form>
    `
})

function addCustomInput(e){
    e.preventDefault();
    const otherCustomInput = `
        <div class="customInputwrap">
            <div class="label-container">
                <label for="inputType${contador}">Tipo de Input: </label>
                <select id="inputType" name="inputType${contador}" required>
                    <option value="text">Texto</option>
                    <option value="number">Número</option>
                    <option value="email">Correo Electrónico</option>
                    <option value="password">Contraseña</option>
                    <option value="date">Fecha</option>
                </select>
            </div>

            <div class="label-container">
                <label for="inputName${contador}">Nombre del Input: </label>
                <input type="text" id="inputName" name="inputName${contador}" required>
            </div>

            <div class="label-container">
                <label for="inputPlaceholder${contador}">Placeholder (Opcional): </label>
                <input type="text" id="inputPlaceholder" name="inputPlaceholder${contador}">
            </div>

            <div class="label-container">
                <label for="inputRequired${contador}">¿Es obligatorio? </label>
                <input type="checkbox" id="inputRequired" name="inputRequired${contador}">
            </div>
        </div>
        <hr>
        `;

        const div = document.querySelector('.customs-inputs-div');
        if(contador == 0){
            div.innerHTML = ``
            contador++;
        }
        div.insertAdjacentHTML('beforeend', otherCustomInput);
        return;
}

formContainer.addEventListener('submit', (e) => {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    const formObject = {};

    // Crear el objeto fields
    const fields = {};

    formData.forEach((value, key) => {
        if (key === 'PhoneNumber' || key === 'PhoneNumberMandatory' || key === 'CustomInput' || key === 'Email' || key === 'EmailMandatory' || key === 'SocialNetwork' || key === 'SocialMediaMandatory' || key.startsWith('input')) {
            // Asigna los campos dentro de fields
            fields[key] = value;
        } else {
            // Otros campos fuera de fields
            formObject[key] = value;
        }
    });

    // Asigna fields al objeto formObject
    formObject.fields = fields;
    formObject.counter = contador;

    const json = JSON.stringify(formObject, null, 2);
    console.log(json);
    fetch(`/form-data/${form_id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf_token
        },
        body: json
    })
    .then(response => response.json())
    .then(result => {
        console.log(result);
        alert('Formulario enviado correctamente.');
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
