document.querySelectorAll('.heure').forEach(function (heure) {
    if (heure.innerHTML.endsWith('5')||heure.innerHTML.endsWith('30')) {
        heure.style.display = 'none';
    }
});

window.addEventListener('resize', function () {
    if (window.innerWidth <= 600) {
        document.getElementById('arrow-left').innerHTML = '←';
        document.getElementById('arrow-right').innerHTML = '→';
    } else {
        document.getElementById('arrow-left').innerHTML = 'Semaine précédente';
        document.getElementById('arrow-right').innerHTML = 'Semaine suivante';
    }
});

// Initial check on page load
if (window.innerWidth <= 600) {
    document.getElementById('arrow-left').innerHTML = '←';
    document.getElementById('arrow-right').innerHTML = '→';
    document.querySelectorAll('.heure').forEach(function (heure) {
        if (heure.innerHTML.endsWith('30')) {
            heure.style.display = 'none';
        }
    });
}