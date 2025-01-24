<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "modificaEvento";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Strana modificaEvento</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina);?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">modifica un evento</h1>
  </div>
</div>

<?php
  
  // TODO: O lo faccio funzionare o lo tolgo
  /*$esitoVerificaLogin = verificaUtenteLoggato($_SESSION);
  if ($esitoVerificaLogin == 0) {
    deviLoggarti();
  } elseif ($esitoVerificaLogin == 1) {
    $username = $_SESSION["username"];
    deviEssereAdmin($username);
  } elseif ($esitoVerificaLogin == 2) {
    echo "<p>loggato</p>";
  }*/

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
         <h2><?=$username?>, scegli quale evento vuoi modificare</h2>
       </div>
     </div>
  
     <?php
      $attivi = 2; // Seleziono tutti gli eventi
      $listaEventi = ottieniListaEventi($attivi);
     ?>

     <!-- Tabella della pagina -->
     <form method="POST" action="modifica_evento_02.php">
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
               <?php while ($row = mysqli_fetch_assoc($listaEventi)) {?>
                 <tr>
                   <td><?=$row['IDEvento']?></td>
                   <td><?=$row['DataEvento']?></td>
                   <td><?=$row['NomeEvento']?></td>
                   <td class="miaColonnaImmagineTabella">
                     <img src="<?=$row['Immagine']?>" class="miaImmagineTabella" alt="Locandina dell'evento">
                   </td>
                   <td>
                     <input type="radio" name="eventoSelezionato" value="<?=$row['IDEvento']?>">
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
 
 HTMLfooter($nomePagina);
?>



</body>
</html>

