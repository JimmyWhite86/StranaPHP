// ANGULAR VALIDAZIONE FORM
var app = angular.module('myAppContatti', []);
app.controller('validateCtrl', function($scope) {
});

// --------
// --------

// JS

// Funzione per filtrare le card eventi in base alla data
function filtraEventi(sceltaEventi) {
    const oggi = new Date().toISOString().split('T')[0]; //Data odierna in formato YYYY-MM-DD
    const eventi = document.querySelectorAll('.evento-card'); // Seleziona tutte le card degli eventi
    //console.log("Data odierna (oggi):", oggi);
    eventi.forEach(evento => {
        const dataEventoStr = evento.getAttribute("data-evento"); // Data evento come stringa
        //const dataEvento = new Date(dataEventoStr); // Converti la data evento in oggetto Date
        //console.log("Data evento [dataEventoStr]:", dataEventoStr, "| Oggetto Date [dataEvento]:", dataEvento);
        if (sceltaEventi === 'futuri') {
            evento.style.display = dataEventoStr >= oggi ? 'block' : 'none'; // Mostra solo eventi futuri
            //console.log(`Evento ${dataEventoStr} (futuro): `, dataEvento >= oggi ? 'mostrato' : 'nascosto');
        } else if (sceltaEventi === 'passati') {
            evento.style.display = dataEventoStr < oggi ? 'block' : 'none'; // Mostra solo eventi passati
            //console.log(`Evento ${dataEventoStr} (passato): `, dataEvento < oggi ? 'mostrato' : 'nascosto');
        } else {
            evento.style.display = 'block'; // Mostra tutti gli eventi
            //console.log(`Evento ${dataEventoStr} (tutti): mostrato`);
        }
    })
}




