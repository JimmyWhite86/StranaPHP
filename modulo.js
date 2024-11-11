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
  let piattiCounter = 0; // Incrementa per ogni nuovo piatto aggiunto

  // Funzione per creare una nuova sezione di piatto
  function creaFormPiatto() {
    piattiCounter++; // Incrementa contatore
    const container = document.createElement("div"); // Crea div container
    container.className = "container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4";
    container.id = `piatto-${piattiCounter}`; // ID univoco per il piatto

    container.innerHTML = `
      <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
        <div class="row justify-content-center">
          <div class="container-fluid my-5">
            <form class="col-md-8 mx-auto">
              <h2 class="mb-5 text-center">Compila i dati per aggiungere un piatto al menu</h2>
              <fieldset>
                <div class="form-group">
                  <label for="nomePiatto-${piattiCounter}">Inserisci il nome del piatto<span class="mandatory">*</span></label>
                  <input type="text" name="piatti[${piattiCounter}][nome]" class="form-control" required>
                  <br>
                  <label for="descrizionePiatto-${piattiCounter}">Inserisci la descrizione</label>
                  <textarea name="piatti[${piattiCounter}][descrizione]" class="form-control col-md-3"></textarea>
                  <br>
                  <p>Inserisci la categoria del piatto<span class="mandatory">*</span></p>
                  <input type="radio" name="piatti[${piattiCounter}][categoria]" value="antipasti"> Antipasto<br>
                  <input type="radio" name="piatti[${piattiCounter}][categoria]" value="primi"> Primi<br>
                  <input type="radio" name="piatti[${piattiCounter}][categoria]" value="secondi"> Secondi<br>
                  <input type="radio" name="piatti[${piattiCounter}][categoria]" value="contorni"> Contorni<br>
                  <input type="radio" name="piatti[${piattiCounter}][categoria]" value="dolci"> Dolci<br>
                  <br>
                  <label for="prezzoPiatto-${piattiCounter}">Inserisci il prezzo del piatto<span class="mandatory">*</span></label>
                  <input type="number" name="piatti[${piattiCounter}][prezzo]" class="form-control" required>
                  <br>
                  <p>Inserisci il cuoco<span class="mandatory">*</span></p>
                  <input type="radio" name="piatti[${piattiCounter}][cuoco]" value="Pino"> Pino<br>
                  <input type="radio" name="piatti[${piattiCounter}][cuoco]" value="Tarta"> Tarta<br>
                  <br>
                </div>
                <div class="text-center">
                  <button type="button" class="btn btn-danger btn-rimuovi" data-target="${container.id}">Rimuovi Piatto</button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>`;

    document.getElementById("containerForm").appendChild(container); // Aggiungi alla pagina
  }

  // Event listener per aggiungere/rimuovere piatti
  document.addEventListener("click", function (e) {
    if (e.target.id === "btnAggiungiRiga") { // Bottone aggiungi
      creaFormPiatto();
    }
    else if (e.target.classList.contains("btn-rimuovi")) { // Bottone rimuovi
      const targetID = e.target.getAttribute("data-target");
      const targetElement = document.getElementById(targetID);
      if (targetElement) {
        targetElement.remove();
      }
    }
  });

  // Aggiungi un piatto iniziale al caricamento
  creaFormPiatto();
});
