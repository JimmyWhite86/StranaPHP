<?php
    session_start();
    include '../includes/init.php';
    $nomePagina = "elimina_utente";
    
    $testoDelTitolo = "elimina un utente"
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>StranAdmin | eliminaUtente</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina); ?>


<main id="mioMain">

  <!-- "Titolo" della pagina -->
    <?php titoloDellaPagina($testoDelTitolo); ?>
    
    <?php
        if (!isset($_SESSION["username"])) {
            deviLoggarti();
        } else {
            $amministratore = $_SESSION["admin"];
            $username = $_SESSION["username"];
            
            if ($amministratore == 0) {
                deviEssereAdmin($username);
            } else { ?> <!-- Utente loggato come admin -->

              <!-- Sottotilo della pagina-->
              <div class="my-5 justify-content-center">
                <div class="text-center">
                  <h2 class="fontTitoloSezione"><?=$username?>, scegli quale utente vuoi eliminare</h2>
                </div>
              </div>
                
                
                <?php
                $attivi = 1; // Per generare la tabella richiamo solo gli utenti attivi.
                $listaUtenti = ottieniListaUtenti($attivi);
                ?>

              <!-- Tabella della pagina -->
              <form method="POST" action="controllo_elimina_utente.php">

                <div class="containerTabella my-5">
                  <div class="rowDesktop justify-content-center d-flex">
                    <div class="col-xl-10">

                      <table class="table table-bordered table-striped text-center align-middle table-responsive table-hover myShadowNera">
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
                                  <label class="visually-hidden" for="utenteID<?=$utente['IDUser']?>">
                                    Seleziona utente <?= $utente['UserName'] ?>
                                  </label>
                                  <input type="radio" name="utenteSelezionato" value="<?=$utente['IDUser']?>"
                                         id="utenteID<?=$utente['IDUser']?>">
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