<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "aggiungi_menu";
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
  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="titoloPagina">aggiungi menu</h1>
    </div>
  </div>
  
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
        if (!$conn) { ?>
          <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
            <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
              <h2>Ci sono stati problemi durante la connessio al database</h2>
              <hr>
              <a href="nuovo_menu_00.php" class="btn btn-primary mb-3">Inserisci un nuovo menu</a><br>
              <a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>
              <a href="gestione_cucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
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
      <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
        <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
          <h2>Il nuovo menu è stato inserito con successo</h2>
          <hr>
          <a href="la_cucina.php" class="btn btn-primary mb-3">Visualizza la pagina con il menù</a><br>
          <a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>
          <a href="gestione_cucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
        </div>
      </div>
      <?php
    } else { ?>
      <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
        <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
          <h2>Ci sono stati problemi durante l'inserimento del menu</h2>
          <hr>
          <a href="la_cucina.php" class="btn btn-primary mb-3">Visualizza la pagina con il menù</a><br>
          <a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>
          <a href="gestione_cucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
        </div>
      </div>
      <?php
    }
  ?>

</main>

<?php HTMLfooter($nomePagina);?>


</body>
  </html><?php
