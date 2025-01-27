<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "modifica_evento";
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
            $messaggio = "Evento modificato con successo";
            echo $messaggio;
          } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
          }
          
        } else {
          $messaggio = "Nessun campo modificato";
        }
        
        
      } else {
        echo "Errore: metodo non consentito";
      }
      
    }
  }
  
  HTMLfooter($nomePagina);
?>



</body>
</html>

