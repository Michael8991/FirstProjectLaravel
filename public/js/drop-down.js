const btns = document.querySelectorAll('.btn');

btns.forEach(function(btn){
    btn.addEventListener('click',(e)=>{
        e.preventDefault();
        addMenu(btn);
    })
})

function addMenu(btn){
    const expID = btn.getAttribute('data-id');
    const menuExists = document.querySelector(`.menu-${expID}`);
    const otherMenuExists = document.querySelector('.drop-down-menu');

    if(menuExists){
        removeMenu(menuExists);
        return;
    }
    else if(otherMenuExists && !menuExists){
        removeMenu(otherMenuExists)
    }
    const dropDownMenu = document.createElement('div');
    dropDownMenu.classList.add('drop-down-menu', 'fade-in', `menu-${expID}`);
    dropDownMenu.innerHTML = `
            <a class="btn" href="/experiences/${expID}">Apariencia</a>
            <a class="btn" href="/EditarFormulario/${expID}">Campos Formulario</a>
    `;
    btn.insertAdjacentElement('afterend', dropDownMenu);
    void dropDownMenu.offsetWidth;
    dropDownMenu.classList.add('show');
}

function removeMenu(menu){
    menu.remove();
    return;
}
