document.querySelectorAll('.heure').forEach(function (heure) {
    if (heure.innerHTML.endsWith('5')||heure.innerHTML.endsWith('30')) {
        heure.style.visibility = 'hidden';
        heure.style.maxHeight = '0';
        heure.style.fontSize = '0';
        heure.style.padding = '0';
        heure.style.overflow = 'hidden';
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
}