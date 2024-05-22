<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Dropdown.css">
    <title>Document</title>
</head>
<body>

    <script src="Dropdown.js"></script>
    <div class="dropdown">
        <div class="select">
            <span class="selected">Figma</span>
            <div class="caret"></div>
        </div>
        <ul>
            <li>17GES</li>
            <li>18GES</li>
            <li>19GES</li>
            <li class="active">20GES</li>
            <li>21GES</li>
        </ul>
    </div>
<script>
    const dropdowns = document.quarySelectorAll('.dropdown');

dropdowns.forEach(dropdown =>{
const select = dropdown.querySelector('.select');
const caret = dropdown.querySelector('.caret');
const menu = dropdown.querySelector('.menu');
const options = dropdown.querySelector('.menu li');
const selected = dropdown.querySelector('.selected');

select.addEventListener('click', () =>{
    select.classList.toggle('select-clicked');
    caret.classList.toggle('caret-rotate');
    menu.classList.toggle('menu-open');
});

options.forEach(option =>{
    option.addEventListener('click', () => {
        selected.innerText = option.innerText;
        select.classList.remove('select-clicked');
        caret.classList.remove('caret-rotate');
        menu.classList.remove('menu-open');
        options.forEach(option => {
            option.classList.remove('active');
        });
        option.classList.add('active');
    });
});
});

</script>
    


    
</body>
</html>