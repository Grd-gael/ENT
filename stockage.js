// Stockage 



const tabs = document.querySelectorAll('.tab');
const tabContents = document.querySelectorAll('.tab-content');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tabContents.forEach(content => content.classList.remove('active'));

        tab.classList.add('active');
        document.getElementById(tab.dataset.target).classList.add('active');
    });
});

// Gestion de la popup
const popup = document.getElementById('file-popup');
console.log(popup);
const addFileButton = document.querySelector('.add-file-button');
const addFileConfirm = document.getElementById('add-file-confirm');

addFileButton.addEventListener('click', () => {
    popup.classList.add('active');
});

addFileConfirm.addEventListener('click', () => {
    popup.classList.remove('active');
    alert('Fichier ajouté !'); // Simule l'ajout
});

popup.addEventListener('click', (e) => {
    if (e.target === popup) {
        popup.classList.remove('active');
    }
});
