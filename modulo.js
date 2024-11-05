// Per vedere se il file module.js viene caricato correttamente
// TODO: Una volta finito il progetto questa riga si può commentare
console.log ("File modulo.js caricato correttamente");

// -----------
// ANGULAR
// -----------
// Validazione form
var app = angular.module('myAppContatti', []);
app.controller('validateCtrl', function($scope) {
});
// --------


// --------
// JS
// --------
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
  });
  //Restituisce un valore in base al numero selezionato
  //Uso questo valore per dare un titolo e informare utente su quale eventi sta guardando
  if (sceltaEventi === 'futuri') return 0;
  if (sceltaEventi === 'passati') return 1;
  return 2;
}

function aggiornaTitolo (tipo) {
  const titoloElement = document.getElementById("titoloEventi");
  if (tipo === 0) {
    titoloElement.textContent = "Cosa ci sarà nelle prossime settimane";
  } else if (tipo === 1) {
      titoloElement.textContent = "Cosa abbiamo organizzato fino ad ora";
  } else {
      titoloElement.textContent = "Tutti gli eventi";
  }
}




// --------------------------
// Funzioni JQuery

// Funzione per aggiungere una nuova riga per creare un nuovo menu

document.addEventListener("DOMContentLoaded", function () {
  let piattiCounter = 0; // Tengo conto del numero di piatti che vengono aggiunti
  function creaFormPiatto() {
    piattiCounter++; // Incremento la variabile che conta i piatti che vengono aggiunti
    const container = document.createElement("div"); // Creo un elemento <div> che conterrà la form per il piatto
    container.className = "container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4" // Aggiungo le classe per lo stile
    container.id = `piatto-${piattiCounter}`;

    //imposto il contenuto HTML del form per inserire il piatto all'interno del <div> appena creato

  }
})




