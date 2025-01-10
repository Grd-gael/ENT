function openPopup() {
    console.log('click');
    document.getElementById('popupOverlay').style.display = 'flex';
}

function closePopup(event) {
    document.getElementById('popupOverlay').style.display = 'none';
}