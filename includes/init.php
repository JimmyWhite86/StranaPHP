<?php
  
  // Definisco la costante BASE_URL per la gestione dei percorsi
  define('BASE_URL', '/StranaPHP/');
  // define('BASE_URL', '/'); // ===> Percorso per l'hosting su Register [[ Ver. 01 ]]
  // define('BASE_URL', '../'); // ===> Percorso per l'hosting su Register [[ Ver. 02 ]]
  /*
   * Uso la funzione "define" perchè:
   * - Le costanti possono essere definite e utilizzate ovunque senza seguire le regole di visibilità;
   *      Hanno un ambito globale: sono comprese in tutto lo script, comprese le funzioni;
   * - Una volta impostate, le costanti non posso essere redefinite e né annullate;
   *  https://www.php.net/manual/it/language.constants.syntax.php
   */
  
  
  // Richiamo tutti i file che contengono le funzioni
  include_once 'function.php';
  include_once 'functionHTML.php';
  include_once 'head.php';
  include_once 'navbarAdmin.php';
  include_once 'navbarUtente.php';
  include_once 'footer.php';
  
?>
