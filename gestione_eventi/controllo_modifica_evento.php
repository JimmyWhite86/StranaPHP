<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "modifica_evento";
  
  $testoDelTitolo = "modifica un evento"
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
  <?php titoloDellaPagina($testoDelTitolo) ?>
  
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
              <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                  <h2 class="fontTitoloSezione fontVerde">Evento modificato con successo</h2>
                  <hr>
                  <a href="modifica_evento_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                    MODIFICA EVENTO
                  </a>
                  <br>
                  <a href="<?= BASE_URL ?>gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                    GESTIONE EVENTI
                  </a>
                  <br>
                </div>
              </div>
  <?php
            } catch (PDOException $e) {
              // echo "Errore: " . $e->getMessage(); ?>
              <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                  <h2 class="fontTitoloSezione fontRosso">Evento non modificato</h2>
                  <p>Ci sono stati dei problemi durante il processo di modifica dell'evento.</p>
                  <p><strong>L'evento non è stato modificato</strong></p>
                  <hr>
                  <a href="modifica_evento_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                    MODIFICA EVENTO
                  </a>
                  <br>
                  <a href="<?= BASE_URL ?>gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                    GESTIONE EVENTI
                  </a>
                  <br>
                </div>
              </div>
  <?php
            }
            
          } else {
            //$messaggio = "Nessun campo modificato"; ?>
            <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
              <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                <h2 class="fontTitoloSezione fontRosso">Evento non modificato</h2>
                <p>Non è stato modificato nessun campo dell'evento</p>
                <p><strong>L'evento non è stato modificato</strong></p>
                <hr>
                <a href="modifica_evento_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                  MODIFICA EVENTO
                </a>
                <br>
                <a href="<?= BASE_URL ?>gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                  GESTIONE EVENTI
                </a>
                <br>
              </div>
            </div>
  <?php
          }
          
          
        } else {
          //echo "Errore: metodo non consentito"; ?>
          <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
            <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
              <h2 class="fontTitoloSezione fontRosso">Evento non modificato</h2>
              <p>Ci sono stati dei problemi durante il processo di modifica dell'evento.</p>
              <p><strong>L'evento non è stato modificato</strong></p>
              <hr>
              <a href="modifica_evento_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                MODIFICA EVENTO
              </a>
              <br>
              <a href="<?= BASE_URL ?>gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                GESTIONE EVENTI
              </a>
              <br>
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

