const button = document.querySelector('.menu-img');
const navbar = document.querySelector('.cabecalho-mobile');

button.addEventListener('click', function() {
    navbar.classList.toggle('show');
});

let btnMusicVideo = document.getElementById('musicVideo');
let btnAfterMovie = document.getElementById('afterMovie');
let btnMotionDesign = document.getElementById('motionDesign');

if (btnMusicVideo && btnMotionDesign && btnAfterMovie) {
    filtrarElementos('musicvideo');
    btnMusicVideo.addEventListener('click', function () {      
        if (btnAfterMovie.classList.contains('active')) {
            btnAfterMovie.classList.remove('active');
            btnMusicVideo.classList.add('active');
        }
        if (btnMotionDesign.classList.contains('active')) {
            btnMotionDesign.classList.remove('active');
            btnMusicVideo.classList.add('active');  
        }
        filtrarElementos('musicvideo');
    });
    
    btnAfterMovie.addEventListener('click', function () {  
        if (btnMotionDesign.classList.contains('active')) {
            btnMotionDesign.classList.remove('active');
            btnAfterMovie.classList.add('active');
        }
        if (btnMusicVideo.classList.contains('active')) {
            btnMusicVideo.classList.remove('active');
            btnAfterMovie.classList.add('active');
        }
        filtrarElementos('aftermovie');
    });
    
    btnMotionDesign.addEventListener('click', function () {
        if (btnMusicVideo.classList.contains('active')) {
            btnMusicVideo.classList.remove('active');
            btnMotionDesign.classList.add('active');
        }
        if (btnAfterMovie.classList.contains('active')) {
            btnAfterMovie.classList.remove('active');
            btnMotionDesign.classList.add('active');
        }
        filtrarElementos('motiondesign');
    });
}

function filtrarElementos(id) {
    let elementos = document.getElementsByClassName('img-wraper');
    for (let index = 0; index < elementos.length; index++) {
        if (elementos[index].id === id) {
            elementos[index].style.display = 'block';
        }else{
            elementos[index].style.display = 'none';
        }
    }
}