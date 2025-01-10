
// Références
const popup = document.getElementById('popup');
const popupTitle = document.getElementById('popup-title');
const popupOptions = document.getElementById('popup-options');
const panierItems = document.getElementById('panier-items');
const totalElement = document.getElementById('total');

// Exemple de données pour les plats
const platsData = {
    sandwich: ['Thon', 'Poulet', 'Jambon-beurre'],
    pastabox: ['Carbonara', 'Bolognaise', '4 Fromages'],
    salades: ['César', 'Niçoise', 'Végétarienne'],
    wraps: ['Poulet', 'Thon', 'Végétarien'],
    boissons: ['Eau', 'Soda', 'Jus de fruits'],
    desserts: ['Brownie', 'Cookie', 'Tartelette']
};

// Prix fictifs pour les plats
const prixData = {
    sandwich: 4.5,
    pastabox: 5,
    salades: 4,
    wraps: 4.5,
    boissons: 2,
    desserts: 2.5
};

// Gestion de la popup
document.querySelectorAll('.plat-btn').forEach(button => {
    button.addEventListener('click', function () {
        const plat = this.dataset.plat;
        popupTitle.textContent = `Choisir un ${plat}`;
        popupOptions.innerHTML = '';
        platsData[plat].forEach(option => {
            const li = document.createElement('li');
            li.textContent = option;
            li.style.cursor = 'pointer';
            li.addEventListener('click', () => addToPanier(plat, option));
            popupOptions.appendChild(li);
        });
        popup.classList.remove('hidden');
    });
});

// Fermer la popup
document.querySelector('.popup-close').addEventListener('click', function () {
    popup.classList.add('hidden');
});

// Ajouter au panier
function addToPanier(plat, option) {
    const prix = prixData[plat];
    const li = document.createElement('li');
    li.textContent = `${plat} (${option}) - ${prix.toFixed(2)} €`;
    panierItems.appendChild(li);
    updateTotal(prix);
    popup.classList.add('hidden');
}

// Mettre à jour le total
function updateTotal(prix) {
    const currentTotal = parseFloat(totalElement.textContent.replace('Total : ', '').replace(' €', '')) || 0;
    const newTotal = currentTotal + prix;
    totalElement.textContent = `Total : ${newTotal.toFixed(2)} €`;
}
