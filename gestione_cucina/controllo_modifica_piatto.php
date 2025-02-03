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
            // $messaggio = "Piatto modificato con successo";
            // echo $messaggio;
            ?>
            <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
              <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                <h2>Il piatto è stato modificato con successo!</h2>
                <hr>
                <a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>
                <a href="modifica_piatto_00.php" class="btn btn-primary mb-3">Modifica un altro piatto</a><br>
                <a href="gestione_cucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
              </div>
            </div>
          <?php
          } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
          }
          
        } else { ?>
          <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
            <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
              <h2>Non è stato modificato nessun campo!</h2>
              <hr>
              <a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>
              <a href="modifica_piatto_00.php" class="btn btn-primary mb-3">Prova nuovamente a modificare</a><br>
              <a href="gestione_cucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
            </div>
          </div>
<?php
}
      } else { ?>
        <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
            <h2>Errore durante la modifica del piatto</h2>
            <!-- <p>Metodo non consentito </p> -->
            <hr>
            <a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>
            <a href="modifica_piatto_00.php" class="btn btn-primary mb-3">Modifica un altro piatto</a><br>
            <a href="gestione_cucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
          </div>
        </div>
     <?php
      }
      
    }
  }

  HTMLfooter($nomePagina);
  
  ?>




</body>
</html>
