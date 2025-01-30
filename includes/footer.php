<?php
#-----------------------------------------------------------------
  # Funzione per visualizzare il footer
  function HTMLfooter ($nomePagina) { ?>
    
    <footer class="text-center bg-nero" aria-label="Footer principale" role="contentinfo">
      <div class="container-fluid">
        
        <div class="p-1 border-bottom" style="border-color: #009fb7"></div> <!-- Riga sopra footer -->
        
        <div class="row justify-content-center">
          
          <div class="col d-flex flex-column align-items-center justify-content-center">
            <p class="fontFooterSopra mb-0 mt-4">Associazione culturale e circolo ARCI</p>
            <p class="fontStranaFooter pl-3 ml-3 mt-0 mb-0">stranamore</p>
            <p class="fontFooterSotto mt-0">Promuoviamo cultura, inclusione e socialità</p>
          </div>
          
          
          <div class="p-1 border-bottom d-block d-md-none" id="separatoreFooter01" style="border-color: #009fb7"></div>
          
          
          <div class="col text-center">
            <h1 class="fontFooter01">Link Utili</h1>
            
            <ul class="list-unstyled">
              
              <?php
                
                $links = [
                  "https://www.arci.it/" => "Arci Nazionale",
                  "https://www.arcitorino.it/" => "Arci Torino",
                  "https://www.arciovest.it/" => "Arci Ovest",
                ];
                
                foreach ($links as $nomeLink => $testoLink) { ?>
                  <li>
                    <a href="<?= htmlspecialchars($nomeLink, ENT_QUOTES, 'UTF-8') ?>"
                       class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                      <?= htmlspecialchars($testoLink, ENT_QUOTES, 'UTF-8') ?>
                    </a>
                  </li>
                  <?php
                }
              
              ?>
            </ul>
          </div>
          
          
          <div class="col text-center">
            <h1 class="fontFooter01">Social</h1>
            
            <a href="https://www.facebook.com/StranamorePinerolo" class="socialIcon p-2" title="Link alla pagina Facebook"
               aria-label="Vai alla pagina Facebook di Stranamore">
              <i class="fa-brands fa-square-facebook fa-3x" role="img" title="Facebook icon" aria-hidden="true"></i>
              <span class="visually-hidden">Facebook</span>
            </a>
            
            <a href="" class="socialIcon p-2" title="Link alla pagine Twitter"
               aria-label="Vai alla pagina Twitter di Stranamore">
              <i class="fa-brands fa-square-x-twitter fa-3x" role="img" title="X / Twitter Icon" aria-hidden="true"></i>
              <span class="visually-hidden">Twitter</span>
            </a>
            <br>
            
            <a href="https://www.instagram.com/stranamorepinerolo/" class="socialIcon p-2" title="Link alla pagina Instagram"
               aria-label="Vai alla pagina Instagram di Stranamore">
              <i class="fa-brands fa-square-instagram fa-3x" role="img" title="Instagram icon" aria-hidden="true"></i>
              <span class="visually-hidden">Instagram</span>
            </a>
            
            <a href="" class="socialIcon p-2" title="Link alla pagina YouTube"
               aria-label="Vai alla pagina Youtube di Stranamore">
              <i class="fa-brands fa-square-youtube fa-3x" role="img" title="YouTube Icon" aria-hidden="true"></i>
              <span class="visually-hidden">YouTube</span>
            </a>
          </div>
          
          
          <div class="col text-center">
            <h1 class="fontFooter01">Contatti</h1>
            
            <ul class="list-unstyled">
              <li>
                <a href="https://maps.app.goo.gl/mb7UeN8NNaJD1kC78"
                   class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                  <i class="fas fa-home me-3" aria-hidden="true"></i> Via Ettore Bignone, 89, 10064 Pinerolo TO
                </a>
              </li>
              <li>
                <a href="mailto:associazione.stranamore@gmail.com"
                   class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                   aria-label="Invia una mail all'associazione Stranamore">
                  <i class="fa fa-envelope me-3" aria-hidden="true"></i>associazione.stranamore@gmail.com
                </a>
              </li>
              <li>
                <a href="Tel:+393516230176"
                   class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                   aria-label="Telefona l'associazione Stranamore">
                  <i class="fas fa-phone me-3" aria-hidden="true"></i>3516230176
                </a>
              </li>
            </ul>
          </div>
        
        </div>
        
        <div class="row bg-giallo align-middle">
          <div class="col d-flex flex-column align-items-center justify-content-center">
            <p class="align-middle">Sito realizzato da Bianchi Andrea</p>
          </div>
        </div>
      </div>
    </footer>


    <!-- Note -->
      <!-- haria-hidden="true" => Per icone solo decorative-->
    <?php
  }
#-----------------------------------------------------------------
?>


