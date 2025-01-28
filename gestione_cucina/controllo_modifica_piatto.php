<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "modifica_piatto";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Strana modificaPiatto</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina);?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">modifica un piatto</h1>
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
        $idPiatto = $_POST["idPiatto"];
        $nomePiattoNew = sanificaInput($_POST["nomePiattoNew"]);
        $descrizioneNew = sanificaInput($_POST["descrizionePiattoNew"]);
        $prezzoNew = sanificaInput($_POST["prezzoPiattoNew"]);
        $categoriaNew = sanificaInput($_POST["categoriaPiattoNew"]);
        
        $datiPiattoSelezionato = ottieniDatiPiatto($idPiatto);
        
        $campiDaAggiornare = [];
        $parametri = [':idPiatto' => $idPiatto];
        
        if ($nomePiattoNew != $datiPiattoSelezionato["nomePiatto"]) {
          $campiDaAggiornare[] = "nomePiatto = :nomePiatto";
          $parametri[':nomePiatto'] = $nomePiattoNew;
        }
        
        if ($descrizioneNew != $datiPiattoSelezionato["descrizionePiatto"]) {
          $campiDaAggiornare[] = "descrizionePiatto = :descrizionePiatto";
          $parametri[':descrizionePiatto'] = $descrizioneNew;
        }
        
        if ($prezzoNew != $datiPiattoSelezionato["prezzoPiatto"]) {
          $campiDaAggiornare[] = "prezzoPiatto = :prezzoPiatto";
          $parametri[':prezzoPiatto'] = $prezzoNew;
        }
        
        if ($categoriaNew != $datiPiattoSelezionato["categoriaPiatto"]) {
          $campiDaAggiornare[] = "categoriaPiatto = :categoriaPiatto";
          $parametri[':categoriaPiatto'] = $categoriaNew;
        }
        
        if (count($campiDaAggiornare) > 0) {
          $query = "UPDATE menuCucina SET " . implode(", ", $campiDaAggiornare) . " WHERE idPiatto = :idPiatto";
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
          echo "Nessun campo modificato";
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
