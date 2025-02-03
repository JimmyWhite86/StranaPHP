<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "modifica_evento_00";
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
    <br>
    <div class="text-center">
      <h2>Passaggio 1 di 2</h2>
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
      } else { ?>

        <!-- Sottotilo della pagina-->
        <div class="my-5 row justify-content-center">
          <div class="text-center">
            <h3><?=$username?>, scegli quale evento vuoi modificare</h3>
          </div>
        </div>
        
        <?php
        $attivi = 2; // Seleziono tutti gli eventi
        $listaEventi = ottieniListaEventi($attivi);
        ?>
        
        <!-- Tabella della pagina -->
        <form method="POST" action="modifica_evento_01.php">
          
          <div class="containerTabella my-5"> <!-- Mantiene il layout centrato e con margine verticale -->
            <div class="row justify-content-center">  <!-- Riga per definire il layout. Centra la colonna orizzontalmente-->
              <div class="col-10"> <!-- colonna che occupa 10 parti su 12 -->
                
                <table class="table table-bordered table-striped text-center align-middle">
                  
                  <thead class="intestazioneTabella">
                    <tr class="intestazioneTabella">
                      <th class="intestazioneTabella">ID Evento</th>
                      <th class="intestazioneTabella">Data</th>
                      <th class="intestazioneTabella">Nome Evento</th>
                      <th class="intestazioneTabella miaColonnaImmagineTabella">Locandina</th>
                      <th class="intestazioneTabella">Seleziona</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                    foreach ($listaEventi as $evento) {?>
                      <tr>
                        <td><?=$evento['IDEvento']?></td>
                        <td><?=$evento['DataEvento']?></td>
                        <td><?=$evento['NomeEvento']?></td>
                        <td class="miaColonnaImmagineTabella">
                          <img src="<?= BASE_URL ?><?=$evento['Immagine']?>" class="miaImmagineTabella"
                               alt="Locandina dell'evento <?=$evento['NomeEvento']?>">
                        </td>
                        <td>
                          <label class="visually-hidden" for="evento_<?= $evento['IDEvento'] ?>">
                            Seleziona evento <?= $evento['NomeEvento'] ?>
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
              <input type="submit" name="invio" id="invio" value="MODIFICA" class="btn btn-danger">
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

