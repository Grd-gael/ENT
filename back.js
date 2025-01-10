//ouverture et fermeture des sections selon GET
let params = new URLSearchParams(location.search);
const action = params.get('action');
if (action) {
    const section = document.getElementById(action);
    if (section) {
        section.setAttribute('open', '');
    }
}


//Backoffice gestion formulaires

const profs = document.getElementById('cours_prof');
const classes = document.getElementById('cours_classe');
const modules = document.getElementById('cours_module');

//restrictions profs
if (profs) {
    //selon classe
    profs.addEventListener('change', function () {
        if (profs.value === '0') {
            for (let i = 0; i < classes.options.length; i++) {
                classes.options[i].style.display = 'block';
            }
        } else {
            const classlist = (profs.options[profs.selectedIndex].getAttribute('data-classe') || '').split(' ');
            for (let i = 0; i < classes.options.length; i++) {
                if (!classlist.includes(classes.options[i].value) && classes.options[i].value !== '0') {
                    classes.options[i].style.display = 'none';
                } else {
                    classes.options[i].style.display = 'block';
                }
            }
        }
    });

    //selon module
    profs.addEventListener('change', function () {
        if (profs.value === '0') {
            for (let i = 0; i < modules.options.length; i++) {
                modules.options[i].style.display = 'block';
            }
        } else {
            const prof = profs.options[profs.selectedIndex].value;
            for (let i = 0; i < modules.options.length; i++) {
                const dataProf = modules.options[i].getAttribute('data-prof') || '';
                if (!dataProf.includes(prof) && modules.options[i].value !== '0') {
                    modules.options[i].style.display = 'none';
                } else {
                    modules.options[i].style.display = 'block';
                }
            }
        }
    });
}

//restrictions classes
if (classes) {
    //selon prof
    classes.addEventListener('change', function () {
        if (classes.value === '0') {
            for (let i = 0; i < profs.options.length; i++) {
                profs.options[i].style.display = 'block';
            }
        } else {
            const classe = classes.options[classes.selectedIndex].value;
            for (let i = 0; i < profs.options.length; i++) {
                const dataClasse = profs.options[i].getAttribute('data-classe') || '';
                if (!dataClasse.includes(classe) && profs.options[i].value !== '0') {
                    profs.options[i].style.display = 'none';
                } else {
                    profs.options[i].style.display = 'block';
                }
            }
        }
    });
}

//restrictions modules
if (modules) {
    //selon prof
    modules.addEventListener('change', function () {
        if (modules.value === '0') {
            for (let i = 0; i < profs.options.length; i++) {
                profs.options[i].style.display = 'block';
            }
        } else {
            const proflist = (modules.options[modules.selectedIndex].getAttribute('data-prof') || '').split(' ');
            for (let i = 0; i < profs.options.length; i++) {
                if (!proflist.includes(profs.options[i].value) && profs.options[i].value !== '0') {
                    profs.options[i].style.display = 'none';
                } else {
                    profs.options[i].style.display = 'block';
                }
            }
        }
    });
}


//Espace professeur gestion formulaires
const etudiant = document.getElementById('etudiant_absence');
const cours = document.getElementById('cours_absence');
const note_enonce = document.getElementById('note_enonce');
const notes = document.querySelectorAll('#note_etudiant');

//restrictions etudiants
if (etudiant) {
    //selon classe cours
    etudiant.addEventListener('change', function () {
        if (etudiant.value === '0') {
            for (let i = 0; i < cours.options.length; i++) {
                cours.options[i].style.display = 'block';
            }
        } else {
            const classe = etudiant.options[etudiant.selectedIndex].getAttribute('data-classe');
            for (let i = 0; i < cours.options.length; i++) {
                if (cours.options[i].getAttribute('data-classe') !== classe && cours.options[i].value !== '0') {
                    cours.options[i].style.display = 'none';
                } else {
                    cours.options[i].style.display = 'block';
                }
            }
        }
    });
}

//restrictions cours
if (cours) {
    //selon classe etudiant
    cours.addEventListener('change', function () {
        if (cours.value === '0') {
            for (let i = 0; i < etudiant.options.length; i++) {
                etudiant.options[i].style.display = 'block';
            }
        } else {
            const classe = cours.options[cours.selectedIndex].getAttribute('data-classe');
            for (let i = 0; i < etudiant.options.length; i++) {
                if (etudiant.options[i].getAttribute('data-classe') !== classe && etudiant.options[i].value !== '0') {
                    etudiant.options[i].style.display = 'none';
                } else {
                    etudiant.options[i].style.display = 'block';
                }
            }
        }
    });
}

//restrictions devoirs
if (note_enonce && notes) {
    if (note_enonce.value === '0') {
        notes.forEach(note => {
            note.style.display = 'none';
        });
    }

    //selon classe enonce
    note_enonce.addEventListener('change', function () {
        if (note_enonce.value === '0') {
            notes.forEach(note => {
                note.style.display = 'none';
            });
        } else {
            const note_classe = note_enonce.options[note_enonce.selectedIndex].getAttribute('data-classe');
            notes.forEach(note => {
                if (note.getAttribute('data-classe') !== note_classe) {
                    note.style.display = 'none';
                } else {
                    note.style.display = 'table-row';
                }
            });
        }
    });
}