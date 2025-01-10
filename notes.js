function showPopup(title, date, note, coef, comment) {
    document.getElementById('popup-title').innerText = title;
    document.getElementById('popup-date').innerText = `Date : ${date}`;
    document.getElementById('popup-note').innerText = `Note : ${note}`;
    document.getElementById('popup-coef').innerText = `Coefficient : ${coef}`;
    document.getElementById('popup-comment').innerText = `Commentaire : ${comment}`;
    document.querySelector('.popup').classList.add('active');
    document.querySelector('.overlay').classList.add('active');
}

function closePopup() {
    document.querySelector('.popup').classList.remove('active');
    document.querySelector('.overlay').classList.remove('active');
}