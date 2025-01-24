<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "crea_utente";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>AdminStrana | Aggiungi Utente</title>
</head>

<body>

<!-- Richiamo la navBar-->
<?php richiamaNavBar($nomePagina) ?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">aggiungi un nuovo utente</h1>
  </div>
</div>

<?php
  
  if (!isset($_SESSION["username"])) {  # Utente non loggato
    deviLoggarti();
  } else { # Utente loggato
    
    $amministratore = $_SESSION ["admin"];
    $username = $_SESSION ["username"];
    
    if ($amministratore == 0) {   # Utente non ha diritti di admin
      deviEssereAdmin($username);
    } else { # Utente è admin --> controllo che i dati inseriti siano corretti
      
      if (isset($_POST["usernameNew"]) && $_POST["usernameNew"] && isset($_POST["psw1"]) && $_POST["psw1"] && isset($_POST["psw2"]) && $_POST["psw2"] ) {
        
        $usernameNew = $_POST["usernameNew"];
        $psw1 = $_POST["psw1"];
        $psw2 = $_POST["psw2"];
        
        if ($psw1 === $psw2) {
          
          $risultatoCreazioneUtente = creaUtente($usernameNew, $psw1);
          $errore = $risultatoCreazioneUtente['messaggio'];
          
          if ($risultatoCreazioneUtente['successo']) {
            //echo "utente creato con successo";
            //print_r($risultatoCreazioneUtente); ?>
            <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
              <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                <h2>L'utente <strong>"<?=$usernameNew?>"</strong> è stato inserito correttamente</h2>
                <hr>
                <a href="crea_utente.php" class="btn btn-primary mb-3">Aggiungi un altro utente</a><br>
                <a href="gestione_utenti.php" class="btn btn-primary mb-3">Gestione utenti</a><br>
              </div>
            </div>
          <?php
          } else {
            if ($risultatoCreazioneUtente['codiceErrore'] == 0) {
              //echo "utente già esistente";
              //print_r($risultatoCreazioneUtente); ?>
              <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                  <h2><?=$username?>, l'utente che hai cercato di inserire è già presente a sistema</h2>
                  <hr>
                  <a href="crea_utente.php" class="btn btn-primary mb-3">Aggiungi un altro utente</a><br>
                  <a href="gestione_utenti.php" class="btn btn-primary mb-3">Gestione utenti</a><br>
                </div>
              </div>
            <?php
            } else {
              //echo "Errore creazione utente";
              //print_r($risultatoCreazioneUtente); ?>
              <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                  <h2><?=$username?>, ci sono stati problemi con l'inserimento del nuovo utente!</h2>
                  <h3>[controlloAggiunteUtente] => Errore: <?=$errore?></h3>
                  <hr>
                  <a href="crea_utente.php" class="btn btn-primary mb-3">Aggiungi un altro utente</a><br>
                  <a href="gestione_utenti.php" class="btn btn-primary mb-3">Gestione utenti</a><br>
                </div>
              </div>
            <?php
            }
          }
          
        } else { ?>

          <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
            <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
              <h2><?=$username?>, le password non corrispondono.</h2>
              <p>Per creare correttamente un nuovo utente, psw1 e psw2 devono essere uguali</p>
              <hr>
              <a href="crea_utente.php" class="btn btn-primary mb-3">Aggiungi un altro utente</a><br>
              <a href="gestione_utenti.php" class="btn btn-primary mb-3">Gestione utenti</a><br>
            </div>
          </div>
          
          <?php
        }
      } else { ?>

        <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
            <h2><?=$username?>, devi compilare tutti i campi del form precedente.</h2>
            <p>Per creare correttamente un nuovo utente, devi compilare tutti i campi del form precedente</p>
            <hr>
            <a href="crea_utente.php" class="btn btn-primary mb-3">Aggiungi un altro utente</a><br>
            <a href="gestione_utenti.php" class="btn btn-primary mb-3">Gestione utenti</a><br>
          </div>
        </div>
        
        <?php
      }
    }
  }
  
  
  
  HTMLfooter($nomePagina);?>

</body>
</html>
