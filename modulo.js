// ANGULAR VALIDAZIONE FORM
var app = angular.module('myAppContatti', []);
app.controller('validateCtrl', function($scope) {
});

// --------
// --------

// JS

// Funzione per filtrare le card eventi in base alla data
function filtraEventi(tipo) {
    const oggi = new Date().toISOString().split(T)[0]; //Data odierna in formato YYYY-MM-DD
    const eventi = document.querySelectorAll('.evento-card'); // Seleziona tutte le card degli eventi

    eventi.forEach(evento => {
        const dataEvento = evento.getAttribute("data-evento");

        if (tipo === 'futuri') {
            evento.style.display = dataEvento >= oggi ? 'block' : 'none';
        } else if (tipo === 'passati'){
            evento.style.display = dataEvento < oggi ? 'block' : 'none';
        } else {
            evento.style.display = 'block';
        }
    });
}


