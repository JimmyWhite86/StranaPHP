<?php
  session_start();
  $nomePagina = "modificaEvento";
  include "function.php";
  include "functionHTML.php";
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
  
  <title>Strana modificaEvento</title>

</head>
<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina);?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">modifica un evento</h1>
  </div>
</div>

<?php
  
  if (!isset($_SESSION["username"])) {
    deviLoggarti();
  } else {
    $amministratore = $_SESSION["admin"];
    $username = $_SESSION["username"];
    
    if ($amministratore == 0) {
      deviEssereAdmin($username);
    } else {


// Connessione al database
      $conn = connetti("Strana01");

// ID dell'evento
      $idEvento = $_POST['idEvento'];

// Ottieni i valori inviati dal form, se vuoti mantieni i valori precedenti
      $nomeEvento = !empty($_POST['eventoNew']) ? $_POST['eventoNew'] : $datiEventoSelezionato['NomeEvento'];
      $dataEvento = !empty($_POST['dataNew']) ? $_POST['dataNew'] : $datiEventoSelezionato['DataEvento'];
      $descrizione = !empty($_POST['descrizioneNew']) ? $_POST['descrizioneNew'] : $datiEventoSelezionato['Descrizione'];
      $immagine = $_FILES['immagine']['name'] ? $_FILES['immagine']['name'] : $datiEventoSelezionato['Immagine'];

// Aggiorna il database
      $sql = "UPDATE Eventi SET NomeEvento='$nomeEvento', DataEvento='$dataEvento', Descrizione='$descrizione', Immagine='$immagine' WHERE IDEvento='$idEvento'";
      if (mysqli_query($conn, $sql)) {
        echo "Evento aggiornato con successo";
      } else {
        echo "Errore nell'aggiornamento: " . mysqli_error($conn);
      }
      
      mysqli_close($conn);
      
      
    }
  }
  
  HTMLfooter($nomePagina);
?>



</body>
</html>

