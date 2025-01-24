<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "aggiungi_piatto";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | Aggiungi Piatto</title>
</head>

<body>

<?php richiamaNavBar($nomePagina) ?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">aggiungi piatto</h1>
  </div>
</div>

<?php
  if (!isset($_SESSION["username"])) {  # Utente non loggato
    deviLoggarti();
  }
  else { # Utente loggato
    
    $amministratore = $_SESSION ["admin"];
    $username = $_SESSION ["username"];
    $idUser = $_SESSION["idUser"];
    
    if ($amministratore == 0) {   # Utente non ha diritti di admin
      deviEssereAdmin($username);
    }
    else { # Utente è admin --> controllo che i dati inseriti siano corretti
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
        
        if ($prezzoPiattoNew < 0) { ?>
          <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
            <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
              <h2>Attenzione</h2>
              <h3>Hai inserito un prezzo inferiore a zero!</h3>
              <p>Prova nuovamente ad inserire il piatto</p>
              <hr>
              <a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>
              <a href="crea_piatto.php" class="btn btn-primary mb-3">Aggiungi un altro piatto</a><br>
              <a href="gestione_cucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
            </div>
          </div>
          <?php
        } else {
          
          $risultatoAggiuntaPiatto = aggiungiPiatto($nomePiattoNew, $descrizionePiattoNew, $categoriaPiattoNew, $prezzoPiattoNew, $cuocoPiattoNew, $disponibilitaPiatto, $dataInserimentoPiatto);
          
          if ($risultatoAggiuntaPiatto) { ?>
            <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
              <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                <h2>Il piatto è stato aggiunto al menu con successo!</h2>
                <h3>Hai aggiunto: <strong><?=$nomePiattoNew?></strong> al menu</h3>
                <hr>
                <a href="home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>
                <a href="crea_piatto.php" class="btn btn-primary mb-3">Aggiungi un altro piatto</a><br>
                <a href="gestione_cucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
              </div>
            </div>
            <?php
          }
          else { // TODO: impostare il layout come per messaggio di successo
            echo "<p>Ci sono stati problemi con l'inserimento del nuovo piatto</p>";
            azioni_amministratore();
          }
        }
      }
      else {
        echo "<p> Attenzione $username! Devi compilare tutti i campi per aggiungere il piatto</p>";
      }
    }
  }
  
  HTMLfooter($nomePagina);?>

</body>
</html>
