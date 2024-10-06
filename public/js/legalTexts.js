const addForm = document.getElementById('addForm')
if(addForm){
    addForm.addEventListener('click', ()=>{
        const formContainer = document.querySelector('.form-container');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const experience_id = document.querySelector('meta[name="experience_id"]').getAttribute('content');
        formContainer.innerHTML = ``;

        formContainer.innerHTML = `
        <form action="/StoreLegalTextForm" method="post">
            <input type="hidden" name="_token" value="${csrfToken}">
            <input type="hidden" name="experience_id" value="${experience_id}">
            <div class="label-container">
                <label for="formName">Nombre del Formulario:</label>
                <input type="text" id="formName" name="formName" placeholder="Introduce el nombre del formulario" required>
            </div>
            <div class="label-container">
                <label for="legalText">Textos Legales:</label>
            </div>
            <div class="label-container">
                <textarea id="legalText" name="legalText" rows="10" cols="50" placeholder="Introduce los textos legales aquí..."></textarea>
            </div>
                <button class="btn" type="submit">Agregar</button>
        </form>`;

    })
}
const editFormm = document.getElementById('editForm')
if(editForm){
    editForm.addEventListener('click', ()=>{
        const formContainer = document.querySelector('.form-container');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const legalText = document.querySelector('meta[name="legalText-meta"]').getAttribute('content');
        const form_id = document.querySelector('meta[name="form_id-meta"]').getAttribute('content');
        const expName = document.querySelector('meta[name="expName-meta"]').getAttribute('content');
        formContainer.innerHTML = ``;

        formContainer.innerHTML = `
        <form action="/putLegalTextForm/${form_id}" method="post">
            <input type="hidden" name="_token" value="${csrfToken}">

            <input type="hidden" name="_method" value="PUT">

            <div class="label-container">
                <label for="formName">Nombre del Formulario:</label>
                <input type="text" id="formName" name="formName" placeholder="Introduce el nombre del formulario" value="${expName}" required>
            </div>
            <div class="label-container">
                <label for="legalText">Textos Legales:</label>
            </div>
            <div class="label-container">
                <textarea id="legalText" name="legalText" rows="10" cols="50" placeholder="Introduce los textos legales aquí...">${legalText}</textarea>
            </div>
                <button class="btn" type="submit">Actualizar</button>
        </form>`;

    })
}
