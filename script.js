const burger = document.querySelector('.burger');
const nav = document.querySelector('.nav-active');
const navLinks = document.querySelectorAll('.nav-links a:not(.profile)');

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
const titre = document.querySelector('h1');
const container = document.querySelector('#container');


btnclose.addEventListener('click', () => {
    favoris.classList.add('closed');
    contentclose.style.display = 'block';
    contentopen.style.display = 'none';
    container.style.margin = 'auto';
    titre.style.width = '100%';
    containerbutton.style.width = '100%';
});


document.addEventListener('click', (event) => {
    if (event.target.classList.contains('closed') || event.target.classList.contains('fa-chevron-left') || event.target.classList.contains('fa-users') || event.target.classList.contains('fa-envelope')) {
        favoris.classList.remove('closed');
        contentclose.style.display = 'none';
        contentopen.style.display = 'block';
        container.style.margin = '0';
        titre.style.width = '70%';
        containerbutton.style.width = '70%';
    }
});


// Références
const btnModifierFavoris = document.getElementById('btn-modifier-favoris');
const popupFavoris = document.getElementById('popup-favoris');
const btnFermerPopup = document.getElementById('btn-fermer-popup');
const btnValiderFavoris = document.getElementById('btn-valider-favoris');
const favorisList = document.getElementById('favoris-list');
const favorisForm = document.getElementById('favoris-form');

// Pages disponibles pour les favoris
const pagesData = [
        {
          "name": "Commande",
          "url": "commande.php",
          "icon": "fa-utensils"
        },
        {
          "name": "Reservation",
          "url": "reservation.php",
          "icon": "fa-calendar-check"
        },
        {
          "name": "Notes",
          "url": "notes.php",
          "icon": "fa-list"
        },
        {
          "name": "Emploi du temps",
          "url": "edt.php",
          "icon": "fa-calendar-days"
        },
        {
          "name": "Absences",
          "url": "absences.php",
          "icon": "fa-user-times"
        },
        {
          "name": "Mail",
          "url": "mail.php",
          "icon": "fa-envelope"
        },
        {
          "name": "Tchat",
          "url": "tchat.php",
          "icon": "fa-comments"
        }
];

// Ouvrir la popup
if (btnModifierFavoris) {
btnModifierFavoris.addEventListener('click', () => {
    popupFavoris.classList.remove('hidden');
    popupFavoris.style.display = "flex";
});
}
    
// Fermer la popup
if (btnFermerPopup) {
btnFermerPopup.addEventListener('click', () => {
    popupFavoris.classList.add('hidden');
    popupFavoris.style.display = "none";
});
}

if ((favorisList)&&(favorisList.innerHTML.includes('<a'))) {
  favorisList.querySelectorAll('a').forEach(link => {
    const url = link.innerHTML;
    const page = pagesData.find(page => page.url === url);

    if (page) {
      const favorisBox = document.createElement('div');
      favorisBox.className = 'favoris-box';  

      const icon = document.createElement('i');
      icon.className = `fa-solid ${page.icon} fa-2xl`;

      const title = document.createElement('h3');
      title.textContent = page.name;

      favorisBox.appendChild(icon);
      favorisBox.appendChild(title);
      link.innerHTML = '';
      link.appendChild(favorisBox);
    }
  });
}



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
