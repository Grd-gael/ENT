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
    container.style.margin = 'auto';
    h1.style.width = '100%';
    containerbutton.style.width = '100%';
});

document.addEventListener('click', (event) => {
    if (event.target.classList.contains('closed') || event.target.classList.contains('fa-chevron-left') || event.target.classList.contains('fa-users')) {
        console.log('click');
        favoris.classList.remove('closed');
        contentclose.style.display = 'none';
        contentopen.style.display = 'block';
        container.style.margin = '0';
        h1.style.width = '70%';
        containerbutton.style.width = '70%';
    }
});


// Tchat


// Sélection des éléments nécessaires
const messagesContainer = document.querySelector('.messages');
const sendMessageButton = document.querySelector('.send-message');
const messageInput = document.querySelector('.message-input input');



// Écouteur d'événement pour le bouton d'envoi
sendMessageButton.addEventListener('click', () => {
    const messageText = messageInput.value;

    if (messageText) {

        const newMessage = document.createElement('div');
        newMessage.classList.add('message-sent');

        newMessage.innerHTML = `
            <p class="message-text">${messageText}</p>
            <p class="message-date">${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</p>
        `;

        messagesContainer.appendChild(newMessage);

        messageInput.value = '';
    }
});








