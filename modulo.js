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
  let piattiCounter = 1; // Variabile contatore per i piatti

  // Funzione per aggiungere una nuova form di piatto
  function creaFormPiatto() {
    const container = document.createElement("div");
    container.className = "mb-4";
    container.id = `piatto-${piattiCounter}`;

    // Creiamo il contenuto HTML per un nuovo piatto
    container.innerHTML = `
          <div class="container-fluid col-md-8 bg-white p-4 mb-4">
            <h2 class="mb-3 text-center">Piatto ${piattiCounter}</h2>
            <label for="nomePiatto-${piattiCounter}">Nome del piatto<span class="mandatory">*</span></label>
            <input type="text" name="piatti[${piattiCounter}][nome]" class="form-control mb-3" required>
            
            <label for="descrizionePiatto-${piattiCounter}">Descrizione</label>
            <textarea name="piatti[${piattiCounter}][descrizione]" class="form-control mb-3"></textarea>
            
            <p>Categoria del piatto<span class="mandatory">*</span></p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="piatti[${piattiCounter}][categoria]" value="antipasti" required> Antipasto
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="piatti[${piattiCounter}][categoria]" value="primi" required> Primi
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="piatti[${piattiCounter}][categoria]" value="secondi" required> Secondi
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="piatti[${piattiCounter}][categoria]" value="contorni" required> Contorni
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="piatti[${piattiCounter}][categoria]" value="dolci" required> Dolci
            </div>
            
            <label for="prezzoPiatto-${piattiCounter}" class="mt-3">Prezzo del piatto<span class="mandatory">*</span></label>
            <input type="number" name="piatti[${piattiCounter}][prezzo]" class="form-control mb-3" required>
            
            <p>Cuoco<span class="mandatory">*</span></p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="piatti[${piattiCounter}][cuoco]" value="Pino" required> Pino
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="piatti[${piattiCounter}][cuoco]" value="Tarta" required> Tarta
            </div>
            
            <div class="text-center mt-4">
              <button type="button" class="btn btn-danger rimuoviRiga" data-id="${piattiCounter}">Rimuovi Piatto</button>
            </div>
          </div>
        `;

    document.getElementById("containerForm").appendChild(container);
    piattiCounter++; // Incrementa il contatore per i piatti
  }

  // Listener per aggiungere un nuovo piatto quando si clicca su "Aggiungi nuovo piatto"
  document.getElementById("btnAggiungiRiga").addEventListener("click", creaFormPiatto);

  // Event delegation per rimuovere un piatto
  document.getElementById("containerForm").addEventListener("click", function (e) {
    if (e.target.classList.contains("rimuoviRiga")) {
      const id = e.target.getAttribute("data-id");
      const piattoDaRimuovere = document.getElementById(`piatto-${id}`);
      piattoDaRimuovere.remove();
    }
  });

  // Aggiunge una prima form di piatto all'inizio
  creaFormPiatto();
});
