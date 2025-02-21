<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "aggiungi_menu";
  
  $testoDelTitolo = "aggiungi un menu"
?>

  <!DOCTYPE html>
  <html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | Aggiungi Menu</title>
</head>

<body>

<?php richiamaNavBar($nomePagina) ?>

<main id="mioMain">


  <!-- "Titolo" della pagina -->
<?php titoloDellaPagina($testoDelTitolo) ?>
  
  <?php
    if (!isset($_SESSION["username"])) {  # Utente non loggato
      deviLoggarti();
    } else { # Utente loggato
      
      $amministratore = $_SESSION ["admin"];
      $username = $_SESSION ["username"];
      $idUser = $_SESSION["idUser"];
      
      if ($amministratore == 0) {   # Utente non ha diritti di admin
        deviEssereAdmin($username);
      } else { // Utente loggato come admin
        
        $erroreInserimentoQuery = 0;
        $quantitaTotalePiatti = isset($_POST["quantitaTotalePiatti"]) ? sanificaInput($_POST["quantitaTotalePiatti"]) : 0;
        eliminaInteroMenu(); // Elimino il menu già presente per inserire quello nuovo
        
        $conn = connetti();
        if (!$conn) { ?> <!-- Errore di connessione -->
          <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
            <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
              <h2 class="fontTitoloSezione fontRosso">Menu non creato</h2>
              <p>Problemi di connessione con il database</p>
              <p>Prova nuovamente a creare il menu</p>
              <hr>
              <a href="nuovo_menu_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA UN MENU</a><br>
              <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a><br>
            </div>
          </div>
          <?php
        }
        
        for ($i = 0; $i < $quantitaTotalePiatti; $i++) {
          
          $nomePiatto = isset($_POST["nomePiatto_$i"]) ? sanificaInput($_POST["nomePiatto_$i"]) : '';
          $descrizionePiatto = isset($_POST["descrizionePiatto_$i"]) ? sanificaInput($_POST["descrizionePiatto_$i"]) : '';
          $categoriaPiatto = isset($_POST["categoriaPiatto_$i"]) ? sanificaInput($_POST["categoriaPiatto_$i"]) : '';
          $prezzoPiatto = isset($_POST["prezzoPiatto_$i"]) ? sanificaInput($_POST["prezzoPiatto_$i"]) : '';
          $cuoco = isset($_POST["cuocoPiatto_$i"]) ? sanificaInput($_POST["cuocoPiatto_$i"]) : '';
          
          if ($prezzoPiatto < 0) {
            $prezzoPiatto = 0;
          }
          
          $sqlInsert = "INSERT INTO menuCucina (nomePiatto, descrizionePiatto, categoriaPiatto, prezzoPiatto, cuoco, disponibilitaPiatto, dataInserimento)
                      VALUES (:nomePiatto, :descrizionePiatto, :categoriaPiatto, :prezzoPiatto, :cuoco, :disponibilita, :dataInserimento)";
          $stmtInsert = $conn->prepare($sqlInsert);
          $parametri = [
            ":nomePiatto" => $nomePiatto,
            ":descrizionePiatto" => $descrizionePiatto,
            ":categoriaPiatto" => $categoriaPiatto,
            ":prezzoPiatto" => $prezzoPiatto,
            ":cuoco" => $cuoco,
            ":disponibilita" => 1,
            ":dataInserimento" => date("d/m/y") ];
          $stmtInsert -> execute($parametri);
          
          // Controllo l'esito della query
          if ($stmtInsert->rowCount() == 0) {
            $erroreInserimentoQuery ++; // Ogni volta che si verifica un errore, incremento il contatore
          }
        }
      }
    }
    
    // Controllo attraverso la variabile $erroreInserimentoQuery se ci sono stati errori durante l'inserimento dei piatti
    if ($erroreInserimentoQuery == 0) { ?>
      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
          <h2 class="fontTitoloSezione fontVerde">Menu creato correttamente</h2>
          <hr>
          <a href="<?= BASE_URL ?>/home_admin.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">HOME ADMIN</a><br>
          <a href="<?= BASE_URL ?>/gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a><br>
        </div>
      </div>
      <?php
    } else { ?>
      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
          <h2 class="fontTitoloSezione fontRosso">Menu non creato</h2>
          <p>Ci sono stati problemi durante l'inserimento del menu</p>
          <p>Prova nuovamente a creare il menu</p>
          <hr>
          <a href="nuovo_menu_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA UN MENU</a><br>
          <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a><br>
        </div>
      </div>
      <?php
    }
  ?>

</main>

<?php HTMLfooter($nomePagina);?>


</body>
  </html><?php
