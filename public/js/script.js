const button = document.querySelector('.menu-img');
const navbar = document.querySelector('.cabecalho-mobile');

button.addEventListener('click', function() {
    navbar.classList.toggle('show');
});