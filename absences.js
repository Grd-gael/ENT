let absence_id = document.getElementById('absence');

function openPopup(event) {
    document.getElementById('popupOverlay').style.display = 'flex';
    absence_id.value = event.target.dataset.absence;
}

function closePopup(event) {
    document.getElementById('popupOverlay').style.display = 'none';
}