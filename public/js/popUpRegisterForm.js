function openPopup(id) {
    window.open(`/popup-content/${id}`, 'popup', 'width=600,height=650');
}
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.registerForm');
    const basicFields = `
        <div class="label-container">
            <label for="DNI">DNI: </label>
            <input type="text" name="DNI" id="dni" value="DNI" class="">
        </div>
        <div class="label-container">
            <label for="Name">Nombre: </label>
            <input type="text" name="Name" id="name" value="Nombre" class="">
        </div>
        <div class="label-container">
            <label for="Surname">Apellidos: </label>
            <input type="text" name="Surname" id="surname" value="Apellidos" class="">
        </div>
    `;

    const form_fields_meta = document.querySelector('meta[name="_fields"]');
    const form_legalText_meta = document.querySelector('meta[name="_legalText"]');
    let form_fields;
    if (form_fields_meta) {
        const content = form_fields_meta.getAttribute('content');

        try {
            form_fields = JSON.parse(content);
            console.log(form_fields);
            inputsBuilder();

        } catch (error) {
            console.error('Error parsing JSON:', error);
        }
    } else {
        console.log('Meta tag no encontrado');
    }

    function inputsBuilder() {
        if (form) {
            form.innerHTML = basicFields;
            const {
                PhoneNumber,
                PhoneNumberMandatory,
                Email,
                EmailMandatory,
                SocialNetwork,
                CustomInput,
                CustomInputMandatory
            } = form_fields;
            if(PhoneNumber == 'on'){
                customInput('PhoneNumberInput','Número de teléfono', PhoneNumberMandatory, 'Número de teléfono', 'number');
                delete form_fields.PhoneNumber;
                delete form_fields.PhoneNumberMandatory;
            }
            if(Email == 'on'){
                customInput('EmailInput','Correo Electrónico', EmailMandatory, 'Correo electrónico');
                delete form_fields.Email;
                delete form_fields.EmailMandatory;
            }
            if(SocialNetwork == 'on'){
                customInput('SocialNetworkInput', 'Red social', SocialNetworkMandatory, 'Su red favorita');
                delete form_fields.SocialNetwork;
                delete form_fields.SocialNetworkMandatory;
            }
            if(CustomInput == 'on'){
                customInput(CustomInput.value, '',CustomInputMandatory.value);
            }
            delete form_fields.CustomInput;
            delete form_fields.CustomInputMandatory;
            const form_fields_array = Object.entries(form_fields)
            for(let i = 0; i< form_fields_array.length/4; i++){
                customInput(
                    form_fields[`inputName${i}`],
                    form_fields[`inputPlaceholder${i}`],
                    form_fields[`inputRequired${i}`],
                    '',
                    form_fields[`inputType${i}`]
                );
            }
            addLegalText();
            form.innerHTML += `<button class="submit-btn" type="submit">Firmar y Enviar</button>`;
        } else {
            console.error('Elemento form no encontrado');
        }
    }

    function customInput(name,label, required, placeholder = '', type='text'){
        const labelContainer = document.createElement('div');
        labelContainer.classList.add('label-container');
        let requiredON = '';
        if(required == 'on'){
            requiredON = 'required'
        }
            labelContainer.innerHTML = `
                <label for="${name}">${label}:</label>
                <input type="${type}" name="${name}" id="${name}" placeholder="${placeholder}" ${requiredON}>
            `;
        form.appendChild(labelContainer);

    }
    function addLegalText(){
        let form_legalText;
        if(form_legalText_meta){
            form_legalText = form_legalText_meta.getAttribute('content')
        }
        const labelContainer = document.createElement('div');
        labelContainer.classList.add('label-container');
        labelContainer.innerHTML = `
            <h4>Avisos legales</h4>
            <p class="legalTextDiv">${form_legalText}</p>
            <input type="checkbox" id="acceptTerms" name="acceptTerms" required>
            <label for="acceptTerms">He leído y acepto los avisos legales.</label>
        `;
        form.appendChild(labelContainer)
    }
});

