<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "aggiungi_piatto";
  
  $testoDelTitolo = "aggiungi un singolo piatto al menu"
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | Aggiungi Piatto</title>
</head>

<body>

<!-- Richiamo la navbar -->
<?php richiamaNavBar($nomePagina) ?>

<main id="mioMain">

<!-- "Titolo" della pagina -->
<?php titoloDellaPagina($testoDelTitolo) ?>

<?php
  if (!isset($_SESSION["username"])) {  # Utente non loggato
    deviLoggarti();
  } else { # Utente loggato
    
    $amministratore = $_SESSION ["admin"];
    $username = $_SESSION ["username"];
    $idUser = $_SESSION["idUser"];
    
    if ($amministratore == 0) {   # Utente non ha diritti di admin
      deviEssereAdmin($username);
    } else { # Utente è admin --> controllo che i dati inseriti siano corretti
      if (
        isset($_POST["nomePiattoNew"]) && $_POST["nomePiattoNew"] &&
        isset($_POST["categoriaPiattoNew"]) && $_POST["categoriaPiattoNew"] &&
        isset($_POST["prezzoPiattoNew"]) && $_POST["prezzoPiattoNew"]
      ) {
        
        $nomePiattoNew = $_POST["nomePiattoNew"];
        $descrizionePiattoNew = $_POST["descrizionePiattoNew"] ?? '';
        $categoriaPiattoNew = $_POST["categoriaPiattoNew"];
        $prezzoPiattoNew = $_POST["prezzoPiattoNew"];
        $cuocoPiattoNew = $_POST['cuocoPiattoNew'] ?? '';
        $disponibilitaPiatto = 1;
        $dataInserimentoPiatto = date("d/m/y");
        
        if ($prezzoPiattoNew < 0) { ?> <!-- Prezzo inferiore a zero -->
          <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
            <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
              <h2 class="fontTitoloSezione fontRosso">Piatto non inserito</h2>
              <p>Attenzione! Il prezzo deve essere maggiore di zero</p>
              <hr>
              <a href="crea_piatto.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA UN SINGOLO PIATTO</a><br>
              <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a>
              <br>
            </div>
          </div>
          <?php
        } else {
          
          $risultatoAggiuntaPiatto = aggiungiPiatto($nomePiattoNew, $descrizionePiattoNew, $categoriaPiattoNew, $prezzoPiattoNew, $cuocoPiattoNew, $disponibilitaPiatto, $dataInserimentoPiatto);
          
          if ($risultatoAggiuntaPiatto) { ?>
            <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
              <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
                <h2 class="fontTitoloSezione fontVerde">Piatto inserito correttamente nel menu</h2>
                <hr>
                <a href="crea_piatto.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA UN SINGOLO PIATTO</a><br>
                <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a>
                <br>
              </div>
            </div>
            <?php
          }
          else {
            // echo "<p>Ci sono stati problemi con l'inserimento del nuovo piatto</p>";
            // azioni_amministratore();
            ?>
            <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
              <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
                <h2 class="fontTitoloSezione fontRosso">Piatto non inserito</h2>
                <p>Ci sono stati problemi durante l'inserimento</p>
                <p>Prova nuovamente a creare il piatto</p>
                <hr>
                <a href="crea_piatto.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA UN SINGOLO PIATTO</a><br>
                <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a>
                <br>
              </div>
            </div>
            <?php
          }
        }
      }
      else {
        //echo "<p> Attenzione $username! Devi compilare tutti i campi per aggiungere il piatto</p>";?>
        <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
          <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
            <h2 class="fontTitoloSezione fontRosso">Piatto non inserito</h2>
            <p>Attenzione! Devi compilare tutti i campi obbligatori per inserire il piatto a menu</p>
            <hr>
            <a href="crea_piatto.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA UN SINGOLO PIATTO</a><br>
            <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a>
            <br>
          </div>
        </div>
        <?php
      }
    }
  }
  
  ?>
  
  
  </main>
  
<!-- Richiamo la funzione che genera il footer -->
 <?php  HTMLfooter($nomePagina); ?>

</body>
</html>
