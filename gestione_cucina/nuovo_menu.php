<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "eliminaMenu";
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keyword" content="Associazione culturale, APS, ARCI, promozione sociale">
  <meta name="description" content="Associazione Culturale Stranamore">
  <meta name="author" content="Bianchi Andrea">

  <!-- CDN CSS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Collegamento al mio file CSS -->
  <link href="base_css.css" rel="stylesheet" type="text/css">

  <!-- Libreria per le icone -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <title>Strana EliminaEvento</title>

  <script>
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
  </script>

</head>
<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina); ?>

<?php if (!isset($_SESSION["username"])) {
  deviLoggarti();
} else {
  $amministratore = $_SESSION["admin"];
  $username = $_SESSION["username"];
  if ($amministratore == 0) {
    deviEssereAdmin($username);
  } else { ?>

    <div class="container text-center my-5">
      <h1>Aggiungi piatti al menu</h1>
      <p><?=$username?>, da questa pagina puoi aggiungere nuovi piatti al menu attuale</p>
    </div>

    <div class="container-fluid bg-rosso pb-4 pt-4 mb-4" id="containerForm">
      <button type="button" id="btnAggiungiRiga" class="btn btn-primary mb-4">Aggiungi nuovo piatto</button>
    </div>
  
  <?php }
} ?>

<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
