<?php
  session_start();
  include "functionHTML.php";
  include "function.php";
  $nomePagina = "eliminaUtente";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>StranaAdmin | eliminaUtente</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina); ?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">elimina un utente</h1>
  </div>
</div>

<?php
  if (!isset($_SESSION["username"])) {
    deviLoggarti();
  }
  else {
    $amministratore = $_SESSION["admin"];
    $username = $_SESSION["username"];
    
    if ($amministratore == 0) {
      deviEssereAdmin($username);
    }
    else { ?> <!-- Utente loggato come admin -->
      
      <!-- Sottotilo della pagina-->
      <div class="my-5 row justify-content-center">
        <div class="text-center">
          <h2><?=$username?>, scegli quale utente vuoi eliminare</h2>
        </div>
      </div>
      
      
      <?php
        $attivi = 1; // Per generare la tabella richiamo solo gli utenti attivi.
        $listaUtenti = ottieniListaUtenti($attivi);
      ?>
      
      <!-- Tabella della pagina -->
      <form method="POST" action="controlloEliminazioneUtente.php">
        <div class="containerTabella my-5"> <!-- Mantiene il layout centrato e con margine verticale -->
          <div class="row justify-content-center">  <!-- Riga per definire il layout. Centra la colonna orizzontalmente-->
            <div class="col-10"> <!-- colonna che occupa 10 parti su 12 -->
              <table class="table table-bordered table-striped text-center align-middle">
                <thead class="intestazioneTabella">
                <tr class="intestazioneTabella">
                  <th class="intestazioneTabella">ID Utente</th>
                  <th class="intestazioneTabella">Nome Utente</th>
                  <th class="intestazioneTabella">Admin</th>
                  <th class="intestazioneTabella">Seleziona</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($listaUtenti as $utente) {?>
                  <tr>
                    <td><?=$utente['IDUser']?></td>
                    <td><?=$utente['UserName']?></td>
                    <td><?=$utente['admin']?></td>
                    <td>
                      <input type="radio" name="utenteSelezionato" value="<?=$utente['IDUser']?>">
                    </td>
                  </tr>
                  <?php
                }
                ?>
                </tbody>
              </table>
            </div> <!-- Fine della colonna-->
          </div>  <!-- Fine della riga -->
          <!-- Pulsante centrato -->
          <div class="text-center mt-4">
            <input type="submit" name="invio" id="invio" value="ELIMINA" class="btn btn-danger">
          </div>
        </div>  <!-- Fine del container -->
      </form>
      
      
      <?php
    }
  }
?>


<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina); ?>


</body>
</html>