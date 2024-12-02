<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "aggiungiMenu";
?>

  <!DOCTYPE html>
  <html lang="it">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="keywords" content="Associazione culturale, APS, ARCI, promozione sociale">
  <meta name="description" content="Associazione Culturale Stranamore">
  <meta name="author" content="Bianchi Andrea">

  <!-- CDN CSS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- JavaScript di Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <!-- Collegamento al mio file CSS -->
  <link href="base_css.css" rel="stylesheet" type="text/css">
  <!-- Libreria per le icone -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- CDN JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- CDN Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
  <!-- Icone -->
  <script src="https://kit.fontawesome.com/1a45214b57.js" crossorigin="anonymous"></script>

  <!--  Collegamento al mio modulo JS -->
  <script src="modulo.js" type="text/javascript"></script>

  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <title>Stranamore | Aggiungi Menu</title>

</head>

<body>

<?php richiamaNavBar($nomePagina) ?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">aggiungi menu</h1>
  </div>
</div>

<?php
  if (!isset($_SESSION["username"])) {  # Utente non loggato
    deviLoggarti();
  } else { # Utente loggato
    
    $amministratore = $_SESSION ["admin"];
    $username = $_SESSION ["username"];
    $idUser = $_SESSION["idUser"];
    
    if ($amministratore == 0) {   # Utente non ha diritti di admin
      deviEssereAdmin($username);
    } else { // Utente loggato come admin
      
      $cuoco = sanificaInput($_POST["cuocoMenu"]);
      $tipoMenu = sanificaInput($_POST["tipoMenu"]);
      $quantitaTotalePiatti = sanificaInput($_POST["quantitaTotalePiatti"]);
      
      $conn = connetti();
      if (!$conn) {
        echo "Probelemi di connessione al db";
      }
      
      for ($i = 0; $i <= $quantitaTotalePiatti; $i++) {
        $nomePiatto = sanificaInput($_POST["nomePiatto_$i"]);
        $descrizionePiatto = sanificaInput($_POST["descrizionePiatto_$i"]);
        $categoriaPiatto = sanificaInput($_POST["categoriaPiatto_$i"]);
        $prezzoPiatto = sanificaInput($_POST["prezzoPiatto_$i"]);
        $cuoco = sanificaInput($_POST["cuocoPiatto_$i"]);
        
        $sqlInsert = "INSERT INTO menuCucina (nomePiatto, descrizionePiatto, categoriaPiatto, prezzoPiatto, cuoco, disponibilitaPiatto, dataInserimento)
                      VALUES (:nomePiatto, :descrizionePiatto, :categoriaPiatto, :prezzoPiatto, :cuoco, :disponibilita, :dataInserimento)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $parametri = [
          ":nomePiatto" => $nomePiatto,
          ":descrizionePiatto" => $descrizionePiatto,
          ":categoriaPiatto" => $categoriaPiatto,
          ":prezzoPiatto" => $prezzoPiatto,
          ":cuoco" => $cuoco,
          ":disponibilita" => 1,
          ":dataInserimento" => date("d/m/y") ];
        $stmtInsert -> execute($parametri);
        
      }
    }
  }
  
  HTMLfooter($nomePagina);?>

</body>
  </html><?php
