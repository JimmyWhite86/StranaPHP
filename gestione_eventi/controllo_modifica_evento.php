<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "modifica_evento";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>StranAdmin | Modifica Evento</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina);?>

<main id="mioMain">

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
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $idEvento = $_POST["idEvento"];
          $nomeEventoNew = sanificaInput($_POST["eventoNew"]);
          $dataEventoNew = sanificaInput($_POST["dataNew"]);
          $descrizioneNew = sanificaInput($_POST["descrizioneNew"]);
          $imagePath = gestisciImmagine();
          
          $datiEventoSelezionato = ottieniDatiEvento($idEvento);
          
          $campiDaAggiornare = [];
          $parametri = [':idEvento' => $idEvento];
          
          if ($nomeEventoNew != $datiEventoSelezionato["NomeEvento"]) {
            $campiDaAggiornare[] = "NomeEvento = :nomeEvento";
            $parametri[':nomeEvento'] = $nomeEventoNew;
          }
          
          if ($dataEventoNew != $datiEventoSelezionato["DataEvento"]) {
            $campiDaAggiornare[] = "DataEvento = :dataEvento";
            $parametri[':dataEvento'] = $dataEventoNew;
          }
          
          if ($descrizioneNew != $datiEventoSelezionato["Descrizione"]) {
            $campiDaAggiornare[] = "Descrizione = :descrizione";
            $parametri[':descrizione'] = $descrizioneNew;
          }
          
          if ($imagePath !== null) {
            $campiDaAggiornare[] = "Immagine = :immagine";
            $parametri[':immagine'] = $imagePath;
          }
          
          if (!empty($campiDaAggiornare)) {
            $query = "UPDATE Eventi SET " . implode(", ", $campiDaAggiornare) . " WHERE IDEvento = :idEvento";
            try {
              $conn = connetti();
              $stmt = $conn->prepare($query);
              $stmt->execute($parametri);
              //$messaggio = "Evento modificato con successo";
              //echo $messaggio; ?>
              <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                  <h2>Evento modificato con successo</h2>
                  <hr>
                  <!--<a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>-->
                  <a href="modifica_evento_00.php" class="btn btn-primary mb-3">Modifica un altro evento</a><br>
                  <a href="gestione_eventi.php" class="btn btn-primary mb-3">Gestione Eventi</a><br>
                </div>
              </div>
  <?php
            } catch (PDOException $e) {
              // echo "Errore: " . $e->getMessage(); ?>
              <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                  <h2>Errore durante la modifica dell'evento</h2>
                  <hr>
                 <!-- <a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>-->
                  <a href="modifica_piatto_00.php" class="btn btn-primary mb-3">Modifica un altro piatto</a><br>
                  <a href="gestione_cucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
                </div>
              </div>
  <?php
            }
            
          } else {
            //$messaggio = "Nessun campo modificato"; ?>
            <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
              <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                <h2>Non è stato modificato nessun campo</h2>
                <hr>
                <!--<a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>-->
                <a href="modifica_evento_00.php" class="btn btn-primary mb-3">Modifica un altro evento</a><br>
                <a href="gestione_eventi.php" class="btn btn-primary mb-3">Gestione Eventi</a><br>
              </div>
            </div>
  <?php
          }
          
          
        } else {
          //echo "Errore: metodo non consentito"; ?>
          <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
            <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
              <h2>Errore durante la modifica dell'evento</h2>
              <!-- <p>Metodo non consentito </p> -->
              <hr>
              <!--<a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>-->
              <a href="modifica_evento_00.php" class="btn btn-primary mb-3">Modifica un altro evento</a><br>
              <a href="gestione_eventi.php" class="btn btn-primary mb-3">Gestione Eventi</a><br>
            </div>
          </div>
  <?php
        }
        
      }
    }
  ?>

</main>

<!-- Richiamo la funzione per creare dinamicamente il footer -->
<?php HTMLfooter($nomePagina); ?>



</body>
</html>

