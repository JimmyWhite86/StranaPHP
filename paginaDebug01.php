<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  include "funzioniDebug.php";
  $nomePagina = "paginaDebug";
?>

<!DOCTYPE html>
<html lang="it">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="keyword" content="Associazione culturale, APS, ARCI, promozione sociale">
  <meta name="description" content="Associazione Culturale Stranamore">
  <meta name="author" content="Bianchi Andrea">
  
  <!-- CDN CSS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- JavaScript di Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
          integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
          integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
          integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          crossorigin="anonymous"></script>
  
  <!-- Collegamento al mio file CSS -->
  <link href="base_css.css" rel="stylesheet" type="text/css">
  <!-- Libreria per le icone -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
 
  <!--  Collegamento al mio modulo JS -->
  <script src="modulo.js" type="text/javascript"></script>
  
  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  
  <title>StranaAdmin | PaginaDebug</title>

</head>
<body>



<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">pagina delle funzioni</h1>
  </div>
  <h2>Solo per Jimmy</h2>
</div>


<?php
  $listaFunzioni = ottieniListaFunzioni();
?>

<!-- Tabella della pagina -->
<form method="POST" action="paginaDebug02.php">
  <div class="containerTabella my-5"> <!-- Mantiene il layout centrato e con margine verticale -->
    <div class="row justify-content-center">  <!-- Riga per definire il layout. Centra la colonna orizzontalmente-->
      <div class="col-10"> <!-- colonna che occupa 10 parti su 12 -->
        <table class="table table-bordered table-striped text-center align-middle">
          <thead class="intestazioneTabella">
          <tr class="intestazioneTabella">
            <th class="intestazioneTabella">Nome Funzione</th>
            <th class="intestazioneTabella">Descrizione</th>
            <th class="intestazioneTabella">Seleziona</th>
          </tr>
          </thead>
          <tbody>
          <?php while ($row = mysqli_fetch_assoc($listaFunzioni)) {?>
            <tr>
              <td><?=$row['nomeFunzione']?></td>
              <td><?=$row['descrizioneFunzione']?></td>
              <td>
                <input type="radio" name="utenteSelezionato" value="<?=$row['idFunzione']?>">
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
      <input type="submit" name="invio" id="invio" value="DAJE" class="btn btn-danger">
    </div>
  </div>  <!-- Fine del container -->
</form>

</body>
</html>