document.addEventListener("DOMContentLoaded", function () {
  let piattiCounter = 0;

  // Funzione per aggiungere una nuova sezione piatto
  function creaFormPiatto() {
    // Incrementa contatore per ID univoci
    piattiCounter++;

    // Crea container per la nuova form del piatto
    const container = document.createElement("div");
    container.className = "container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4";
    container.id = `piatto-${piattiCounter}`;

    // Contenuto HTML del piatto
    container.innerHTML = `
          <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
            <div class="row justify-content-center">
              <div class="container-fluid my-5">
                <form class="col-md-8 mx-auto">
                  <h2 class="mb-5 text-center">Compila i dati per aggiungere un piatto al menu</h2>
                  <fieldset>
                    <div class="form-group">
                      <label for="nomePiatto-${piattiCounter}">Inserisci il nome del piatto<span class="mandatory">*</span></label>
                      <input type="text" name="nomePiatto[]" class="form-control" required>
                      <br>
                      <label for="descrizionePiatto-${piattiCounter}">Inserisci la descrizione</label>
                      <textarea name="descrizionePiatto[]" class="form-control col-md-3"></textarea>
                      <br>
                      <p>Inserisci la categoria del piatto<span class="mandatory">*</span></p>
                      <input type="radio" name="categoriaPiatto[${piattiCounter}]" value="antipasti"> Antipasto<br>
                      <input type="radio" name="categoriaPiatto[${piattiCounter}]" value="primi"> Primi<br>
                      <input type="radio" name="categoriaPiatto[${piattiCounter}]" value="secondi"> Secondi<br>
                      <input type="radio" name="categoriaPiatto[${piattiCounter}]" value="contorni"> Contorni<br>
                      <input type="radio" name="categoriaPiatto[${piattiCounter}]" value="dolci"> Dolci<br>
                      <br>
                      <label for="prezzoPiatto-${piattiCounter}">Inserisci il prezzo del piatto<span class="mandatory">*</span></label>
                      <input type="number" name="prezzoPiatto[]" class="form-control" required>
                      <br>
                      <p>Inserisci il cuoco<span class="mandatory">*</span></p>
                      <input type="radio" name="cuocoPiatto[${piattiCounter}]" value="Pino"> Pino<br>
                      <input type="radio" name="cuocoPiatto[${piattiCounter}]" value="Tarta"> Tarta<br>
                      <br>
                    </div>
                    <div class="text-center">
                      <button type="button" class="btn btn-primary btn-aggiungi">Aggiungi Piatto</button>
                      <button type="button" class="btn btn-danger btn-rimuovi" data-target="#piatto-${piattiCounter}">Rimuovi Piatto</button>
                      <button type="submit" formaction="controllaInserimentoMenu.php" class="btn btn-success">Termina</button>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        `;

    // Aggiunge il container al form principale
    document.getElementById("containerForm").appendChild(container);
  }

  // Event listener per aggiungere piatti dinamicamente
  document.addEventListener("click", function (e) {
    if (e.target.classList.contains("btn-aggiungi")) {
      creaFormPiatto();
    } else if (e.target.classList.contains("btn-rimuovi")) {
      const targetId = e.target.getAttribute("data-target");
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        targetElement.remove();
      }
    }
  });

  // Inizializza con un primo piatto
  creaFormPiatto();
});

// -----------------------------------------------------------
// -----------------------------------------------------------
// -----------------------------------------------------------
// -----------------------------------------------------------


// Una volta che tutto il contenuto della pagina è stato caricato, esegue questa funzione.
document.addEventListener("DOMContentLoaded", function () {

  // Variabile contatore per tenere traccia del numero di piatti aggiunti.
  let piattiCounter = 0;

  // Funzione per aggiungere una nuova sezione per inserire i dati di un piatto.
  function creaFormPiatto() {

    // Incrementa il contatore per assegnare un ID unico a ogni nuovo piatto.
    piattiCounter++;

    // Crea un nuovo elemento <div> che conterrà la form per il piatto.
    const container = document.createElement("div");

    // Aggiunge le classi di Bootstrap e altre classi personalizzate per applicare lo stile.
    container.className = "container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4";

    // Imposta un ID unico per il div, in modo da poterlo identificare facilmente.
    container.id = `piatto-${piattiCounter}`;

    // Imposta il contenuto HTML della form per il piatto all'interno del div appena creato.
    container.innerHTML = `
          <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
            <div class="row justify-content-center">
              <div class="container-fluid my-5">
                <form class="col-md-8 mx-auto">
                  <h2 class="mb-5 text-center">Compila i dati per aggiungere un piatto al menu</h2>
                  <fieldset>
                    <div class="form-group">
                      <!-- Campo per inserire il nome del piatto -->
                      <label for="nomePiatto-${piattiCounter}">Inserisci il nome del piatto<span class="mandatory">*</span></label>
                      <input type="text" name="nomePiatto[]" class="form-control" required>
                      <br>
                      
                      <!-- Campo per inserire la descrizione del piatto -->
                      <label for="descrizionePiatto-${piattiCounter}">Inserisci la descrizione</label>
                      <textarea name="descrizionePiatto[]" class="form-control col-md-3"></textarea>
                      <br>
                      
                      <!-- Radio button per selezionare la categoria del piatto -->
                      <p>Inserisci la categoria del piatto<span class="mandatory">*</span></p>
                      <input type="radio" name="categoriaPiatto[${piattiCounter}]" value="antipasti"> Antipasto<br>
                      <input type="radio" name="categoriaPiatto[${piattiCounter}]" value="primi"> Primi<br>
                      <input type="radio" name="categoriaPiatto[${piattiCounter}]" value="secondi"> Secondi<br>
                      <input type="radio" name="categoriaPiatto[${piattiCounter}]" value="contorni"> Contorni<br>
                      <input type="radio" name="categoriaPiatto[${piattiCounter}]" value="dolci"> Dolci<br>
                      <br>
                      
                      <!-- Campo per inserire il prezzo del piatto -->
                      <label for="prezzoPiatto-${piattiCounter}">Inserisci il prezzo del piatto<span class="mandatory">*</span></label>
                      <input type="number" name="prezzoPiatto[]" class="form-control" required>
                      <br>
                      
                      <!-- Radio button per selezionare il cuoco del piatto -->
                      <p>Inserisci il cuoco<span class="mandatory">*</span></p>
                      <input type="radio" name="cuocoPiatto[${piattiCounter}]" value="Pino"> Pino<br>
                      <input type="radio" name="cuocoPiatto[${piattiCounter}]" value="Tarta"> Tarta<br>
                      <br>
                    </div>
                    
                    <!-- Sezione dei pulsanti: aggiungi, rimuovi, termina -->
                    <div class="text-center">
                      <button type="button" class="btn btn-primary btn-aggiungi">Aggiungi Piatto</button>
                      <button type="button" class="btn btn-danger btn-rimuovi" data-target="#piatto-${piattiCounter}">Rimuovi Piatto</button>
                      <button type="submit" formaction="controllaInserimentoMenu.php" class="btn btn-success">Termina</button>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        `;

    // Aggiunge il nuovo container creato all'elemento con id "containerForm" sulla pagina HTML.
    document.getElementById("containerForm").appendChild(container);
  }

  // Event listener per gestire i click sui pulsanti "Aggiungi Piatto" e "Rimuovi Piatto".
  document.addEventListener("click", function (e) {
    // Se l'elemento cliccato ha la classe "btn-aggiungi", crea una nuova form per il piatto.
    if (e.target.classList.contains("btn-aggiungi")) {
      creaFormPiatto();
    }
    // Se l'elemento cliccato ha la classe "btn-rimuovi", rimuove il container corrispondente.
    else if (e.target.classList.contains("btn-rimuovi")) {
      // Ottiene l'attributo data-target, che contiene l'ID del div da rimuovere.
      const targetId = e.target.getAttribute("data-target");

      // Seleziona l'elemento con l'ID specificato e lo rimuove dal DOM.
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        targetElement.remove();
      }
    }
  });

  // Aggiunge una prima form per il piatto alla pagina all'inizio.
  creaFormPiatto();
});

