<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "elimina_evento";
  
  $testoDelTitolo = "elimina un evento"
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>StranaAdmin | Elimina Evento</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina); ?>

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
      } else { ?>

        <!-- Sottotilo della pagina-->
        <div class="my-5 justify-content-center">
          <div class="text-center">
            <h2 class="fontTitoloSezione"><?=$username?>, scegli quale evento vuoi eliminare</h2>
          </div>
        </div>
        
        <?php
          $attivi = 1; // Seleziono solo eventi attivi
          $listaEventi = ottieniListaEventi($attivi);
        ?>

        <!-- Tabella della pagina -->
        <form method="POST" action="controllo_elimina_evento.php">
          
          <div class="containerTabella my-5"> <!-- Mantiene il layout centrato e con margine verticale -->
            <div class="rowDesktop justify-content-center d-flex">  <!-- Riga per definire il layout. Centra la colonna orizzontalmente-->
              <div class="col-xl-10">
                
                <table class="table table-bordered table-striped text-center align-middle table-responsive myShadowNera table-hover">
                  
                  <thead class="intestazioneTabella">
                    <tr class="intestazioneTabella text-uppercase">
                      <th class="intestazioneTabella miaColonnaImmagineTabella">ID Evento</th>
                      <th class="intestazioneTabella">Data</th>
                      <th class="intestazioneTabella">Nome Evento</th>
                      <th class="intestazioneTabella miaColonnaImmagineTabella">Locandina</th>
                      <th class="intestazioneTabella">Seleziona</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                    foreach ($listaEventi as $evento) {
                      $dataFormattata = date('d-m-Y', strtotime($evento['DataEvento'])) ?>
                      <tr>
                        <td class="miaColonnaImmagineTabella">
                            <?=$evento['IDEvento']?>
                        </td>
                        <td>
                            <?=$dataFormattata?>
                        </td>
                        <td>
                            <?=$evento['NomeEvento']?>
                        </td>
                        <td class="miaColonnaImmagineTabella">
                          <img src="<?= BASE_URL ?><?=$evento['Immagine']?>" class="miaImmagineTabella"
                               alt="Locandina dell'evento <?=$evento['NomeEvento']?>">
                        </td>
                        <td>
                          <label class="visually-hidden" for="evento_<?= $evento['IDEvento']?>">
                            Seleziona <?= $evento['NomeEvento'] ?>
                          </label>
                          <input type="radio" name="eventoSelezionato" value="<?=$evento['IDEvento']?>"
                                 id="evento_<?= $evento['IDEvento'] ?>">
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

</main>

<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>