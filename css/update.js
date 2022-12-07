const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.selectbtn')
    const caret = dropdown.querySelector('.caret')
    const menuoption = dropdown.querySelector('.menuoption')
    const menuli = dropdown.querySelector('.menuoption li')
    const selected = dropdown.querySelector('.selected')

    select.addEventListener('click', () => {
        select.classList.toggle('selectbtn-clicked');
        caret.classList.toggle('caret-rotate');
        menuoption.classList.toggle('menuoption-open');
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            selected.innerText = option
        })
    })
})