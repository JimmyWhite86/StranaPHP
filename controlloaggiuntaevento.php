<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "aggiungiEvento";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- JavaScript di Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  
  <!-- Collegamento al mio file CSS -->
  <link href="base_css.css" rel="stylesheet" type="text/css">
  <!-- Libreria per le icone -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
  <!-- CDN JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- CDN Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
  <!-- Icone -->
  <script src="https://kit.fontawesome.com/1a45214b57.js" crossorigin="anonymous"></script>
  
  <!--  Collegamento al mio modulo JS -->
  <script src="modulo.js" type="text/javascript"></script>
  
  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  
  <title>Stranamore | Home</title>

</head>

<body>

<!-- Richiamo la navBar-->
<?php richiamaNavBar($nomePagina) ?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">aggiungi un evento</h1>
  </div>
</div>

<?php

  if (!isset($_SESSION["username"])) {  # Utente non loggato
    deviLoggarti();
  }
  else { # Utente loggato

    $amministratore = $_SESSION ["admin"];
    $username = $_SESSION ["username"];

    if ($amministratore == 0) {   # Utente non ha diritti di admin
      deviEssereAdmin($username);
    }
    else { # Utente è admin --> controllo che i dati inseriti siano corretti
      if ( isset($_POST["eventoNew"]) && $_POST["eventoNew"] && isset($_POST["dataNew"]) && $_POST["dataNew"] && isset($_POST["descrizioneNew"]) && $_POST["descrizioneNew"]) {
        
        $eventoNew = $_POST["eventoNew"];
        $dataNew = $_POST["dataNew"];
        $descrizioneNew = $_POST["descrizioneNew"];

        $upload_percorso = "immagini/";
        $file_tmp = $_FILES['immagine']['tmp_name'];
        $file_nome = $_FILES['immagine']['name'];
        $pathnameImmagine = "$upload_percorso"."$file_nome";
        move_uploaded_file($file_tmp, $upload_percorso.$file_nome);

        $conn = connetti ("Strana01");
        if (!$conn) {
          erroreConnessioneHTML($conn);
          /*echo "<p>La connessione ha avuto problemi".mysqli_error($conn);
          azioni_amministratore();*/
        }
        else {

          // TODO: Far diventare questo pezzo una funzione da inserire nel file esterno!
          $sql = "SELECT nomeEvento FROM Eventi WHERE nomeEvento = 'eventoNew'";
          $tmp = mysqli_query($conn,$sql);
          $numeroRighe = mysqli_num_rows($tmp);

          if ($numeroRighe == 0) {  # Vuol dire che nella tabella non ci sono altri eventi con quel nome
            $sql = "INSERT INTO Eventi (NomeEvento, DataEvento, Immagine, Descrizione, eliminato)
                    VALUES ('$eventoNew', '$dataNew', '$pathnameImmagine', '$descrizioneNew', '0')";
            $tmp = mysqli_query($conn, $sql);
            if ($tmp) { ?>
              <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                  <h2>L'evento <strong>"<?=$eventoNew?>"</strong> è stato inserito correttamente</h2>
                  <hr>
                  <a href="aggiungievento.php" class="btn btn-primary mb-3">Aggiungi un altro evento</a><br>
                  <a href="gestioneEventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
                </div>
              </div>
            <?php
            }
            else { ?>
              <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                  <h2><?=$username?>, ci sono stati problemi con l'inserimento del nuovo evento!</h2>
                  <h3>[controlloaggiungievento] => Errore: <?=mysqli_error($conn)?></h3>
                  <hr>
                  <a href="aggiungievento.php" class="btn btn-primary mb-3">Aggiungi evento</a><br>
                  <a href="gestioneEventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
                </div>
              </div>
<?php
            }
          }
            else {
              echo "<p>Evento già presente</p>";
              azioni_amministratore();
            }
            mysqli_close($conn);
        }
      }
      else {
        echo "<p> Attenzione $username! Devi compilare tutti i campi per aggiungere l'evento</p>";
      }
    }
  }


  HTMLfooter($nomePagina);?>

</body>
</html>
