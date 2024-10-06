const deleteRegisterBtn = document.getElementById('deleteRegisterBtn');
const deleteDiv = document.querySelector('.delete-searcher-container');
deleteRegisterBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    deleteDiv.innerHTML = ``;
    deleteDiv.innerHTML =
    `
        <div class="search-container">
            <form action="/buscarBorrar" method="GET">
                <input type="text" name="query" placeholder="Buscar por nombre..." required>
                <button type="submit">Buscar</button>
            </form>
        </div>
    `;
})
