const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.selectbtn');
    const caret = dropdown.querySelector('.caret');
    const menu = dropdown.querySelector('.menuoption');
    const options = dropdown.querySelector('.menuoption li');
    const selected = dropdown.querySelector('.selected');

    select.addEventListener('click', () => {
        select.classList.toggle('selectbtn-clicked');
        caret.classList.toggle('caret-rotate');
        menu.classList.toggle('menuoption-open');
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            selected.innerText = option.innerText;
            select.classList.remove('selectbtn-clicked');
            caret.classList.remove('caret-rotate');
            menu.classList.remove('menuoption-open');
            options.forEach(option => {
                option.classList.remove('active');
            });
            option.classList.add('active');
        });
    });
});