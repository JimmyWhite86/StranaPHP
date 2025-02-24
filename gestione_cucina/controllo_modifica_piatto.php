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
    <h1 class="titoloPagina">modifica un piatto del menu</h1>
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
            <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
              <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                <h2 class="fontTitoloSezione fontVerde">Piatto modificato con successo</h2>
                <hr>
                <a href="modifica_piatto_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                  MODIFICA PIATTO
                </a>
                <a href="<?= BASE_URL ?>/gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                  GESTIONE CUCINA
                </a>
              </div>
            </div>
          <?php
          } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
          }
          
        } else { ?>
          <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
            <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
              <h2 class="fontTitoloSezione fontRosso"> Attenzione! Piatto non modificato</h2>
              <p>Non hai modificato nessun campo nella pagina precedente</p>
              <hr>
              <a href="modifica_piatto_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                MODIFICA PIATTO
              </a>
              <a href="<?= BASE_URL ?>/gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                GESTIONE CUCINA
              </a>
            </div>
          </div>
<?php
}
      } else { ?> <!-- Errore durante la modifica del piatto -->
        <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
          <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
            <h2 class="fontTitoloSezione fontRosso"> Attenzione! Piatto non modificato</h2>
            <p>Ci sono stati dei problemi durante la modifica</p>
            <hr>
            <a href="elimina_piatto.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
              ELIMINA PIATTO
            </a>
            <a href="<?= BASE_URL ?>/gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
              GESTIONE CUCINA
            </a>
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
