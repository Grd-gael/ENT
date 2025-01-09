const burger = document.querySelector('.burger');
const nav = document.querySelector('.nav-active');
const navLinks = document.querySelectorAll('.nav-links a:not(.profile)');
console.log(navLinks);

burger.addEventListener('click', () => {
    if (nav.classList.contains('show')) {
        nav.classList.remove('show');
    }
    else {
        nav.classList.add('show');
    }
});


// Favoris

const favoris = document.querySelector('aside');
const btnclose = document.querySelector('.close');
const contentopen = document.querySelector('.content-open');
const contentclose = document.querySelector('.content-close');
const containerbutton = document.querySelector('.container-button');
const h1 = document.querySelector('h1');
const container = document.querySelector('#container');


btnclose.addEventListener('click', () => {
    favoris.classList.add('closed');
    contentclose.style.display = 'block';
    contentopen.style.display = 'none';
    container.classList.remove('container-section-margin');
    container.classList.add('container-section-fullpage');
    h1.style.width = '95%';
    containerbutton.style.width = '95%';
});

if ('aside.closed') {
    document.querySelector('.closed').addEventListener('click', () => {
        console.log('click');
        favoris.classList.remove('closed');
        contentclose.style.display = 'none';
        contentopen.style.display = 'block';
        container.classList.add('container-section-margin');
        container.classList.remove('container-section-fullpage');
        h1.style.width = '70%';
        containerbutton.style.width = '70%';
    });
}




