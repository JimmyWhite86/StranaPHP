<?php
  session_start();
  $nomePagina = "modificaEvento";
  include "function.php";
  include "functionHTML.php";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
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

