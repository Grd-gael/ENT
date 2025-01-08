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


