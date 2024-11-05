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

$(document).ready(function () {
  let index = 1; //Variabile per tenere traccia dell'indice dei piatti

  //Funzione per creare una nuova riga d'input
  $('#btnAggiungiRiga').click(function () {
    $('#piattiContainer').append(`
      <fieldset class="rigaPiattoDaInserire">
        <div class="form-group" >
          <label for="nomePiattoNew">
            Inserisci il nome del piatto
            <span class="mandatory">*</span>
          </label>
                    <input type="text" name="piatti[${index}][nome]" id="piatti[${index}][nome]" class="form-control"
                           title="Inserisci il nome del piatto" required aria-required="true">
                    <br>
                
                    <label for="descrizionePiattoNew">
                      Inserisci la descrizione
                    </label>
                    <textarea name="piatti[${index}][descrizione]" id="piatti[${index}][descrizione]" class="form-control col-md-3"
                              title="inserisci la descrizione del piatto">
                    </textarea>
                    <br>
                
                    <p>
                      Inserisci la categoria del piatto
                      <span class="mandatory">*</span>
                    </p>
                    <input type="radio" id="antipasto" name="piatti[${index}][categoria]" value="antipasti">
                    <label for="antipasto">Antipasto</label><br>
                    <input type="radio" id="primi" name="piatti[${index}][categoria]" value="primi">
                    <label for="primi">Primi</label><br>
                    <input type="radio" id="secondi" name="piatti[${index}][categoria]" value="secondi">
                    <label for="secondi">Secondi</label><br>
                    <input type="radio" id="contorni" name="piatti[${index}][categoria]" value="contorni">
                    <label for="contorni">Contorni</label><br>
                    <input type="radio" id="dolci" name="piatti[${index}][categoria]" value="dolci">
                    <label for="dolci">Dolci</label><br>
                    <br>
                
                    <label for="prezzoPiattoNew">
                      Inserisci il prezzo del piatto
                      <span class="mandatory">*</span>
                    </label>
                    <input type="number" name="piatti[${index}][prezzo]" id="piatti[${index}][prezzo]" class="form-control"
                           title="Inserisci il prezzo del piatto" required aria-required="true">
                    <br>
                
                    <p>
                      Inserisci il cuoco
                      <span class="mandatory">*</span>
                    </p>
                    <input type="radio" id="pino" name="piatti[${index}][cuoco]" value="Pino">
                    <label for="pino">Pino</label><br>
                    <input type="radio" id="tarta" name="piatti[${index}][cuoco]" value="Tarta">
                    <label for="tarta">Tarta</label><br>
                    
                    <div class="text-center">
                      <button type="button" class="btn btn-danger rimuoviRiga">Rimuovi</button>
                    </div>
                
                    <br><br>
                    </div>
                    </fieldset>
    `);
    index++;
  });

  // Funzione per rimuovere una riga di input specifica
  $(document).on('click', '.rimuoviRiga', function() {
    $(this).closest('.rigaPiattoDaInserire').remove();
  });

});




