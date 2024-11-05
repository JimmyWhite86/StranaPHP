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
