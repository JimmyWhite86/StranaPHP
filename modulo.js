// Per vedere se il file module.js viene caricato correttamente
console.log("File modulo.js caricato correttamente");
console.log("AngularJS caricato: ", angular.version.full);

// -----------
// ANGULAR
// -----------

// Validazione form contatti
var appContatti = angular.module('myAppContatti', []);
appContatti.controller('validateCtrl', function($scope) {
});
// --------

// Validazione form login
var appLogin = angular.module('myAppLogin', []);
appLogin.controller('validateLoginCtrl', function($scope) {
});
// --------

// Validazione form nuovoMenu00
var appNuovoMenu00 = angular.module('myAppNuovoMenu00', []);
appNuovoMenu00.controller('validateNuovoMenu00Ctrl', function($scope) {
  // Inizializzo i modelli
  $scope.cuocoMenu = '';
  $scope.qtyAntipasti = 0;
  $scope.qtyPrimi = 0;
  $scope.qtySecondi = 0;
  $scope.qtyContorni = 0;
  $scope.qtyDolci = 0;
  $scope.tipoMenu = '';

  //Funzione di validazione
  $scope.validateForm = function () {
    if (($scope.qtyAntipasti === 0 || !$scope.qtyAntipasti) &&
      ($scope.qtyPrimi === 0 || !$scope.qtyPrimi) &&
      ($scope.qtySecondi === 0 || !$scope.qtySecondi) &&
      ($scope.qtyContorni === 0 || !$scope.qtyContorni) &&
      ($scope.qtyDolci === 0 || !$scope.qtyDolci)) {
      alert("Almeno una categoria deve essere maggiore di zero");
      return false;
    }
    return true;
  };
});
// --------

// Vadlidazione form nuovoMenu01
var appNuovoMenu01 = angular.module('myAppNuovoMenu01', []);
appNuovoMenu01.controller('validateNuovoMenu01Ctrl', function($scope) {
})
// --------

// Validazione form aggiungiPiatto (aggiunta di un singolo piatto al menu)
var appNuovoPiatto = angular.module('myAppNuovoPiatto', []);
appNuovoPiatto.controller('validateNuovoPiattoCtrl', function($scope) {
});
// --------

// Validazione form nuovoEvento
var appNuovoEvento = angular.module('myAppNuovoEvento', []);
appNuovoEvento.controller('validateNuovoEventoCtrl', function($scope) {
});
// --------

// Validazione form nuovo utente
var appNuovoUtente = angular.module('myAppNuovoUtente', []);
appNuovoUtente.controller('validateNuovoUtenteCtrl', function($scope) {
});



// --------
// JS
// --------
// Funzione per filtrare le card eventi in base alla data
function filtraEventi(sceltaEventi) {
  const oggi = new Date().toISOString().split('T')[0]; //Data odierna in formato YYYY-MM-DD
  const eventi = document.querySelectorAll('.evento-card'); // Seleziona tutte le card degli eventi
  //console.log("Data odierna (oggi):", oggi);
  eventi.forEach(evento => {
    const dataEventoStr = evento.getAttribute("data-evento"); // Data evento come stringa
    //const dataEvento = new Date(dataEventoStr); // Converti la data evento in oggetto Date
    //console.log("Data evento [dataEventoStr]:", dataEventoStr, "| Oggetto Date [dataEvento]:", dataEvento);
    if (sceltaEventi === 'futuri') {
      evento.style.display = dataEventoStr >= oggi ? 'block' : 'none'; // Mostra solo eventi futuri
      //console.log(`Evento ${dataEventoStr} (futuro): `, dataEvento >= oggi ? 'mostrato' : 'nascosto');
    } else if (sceltaEventi === 'passati') {
      evento.style.display = dataEventoStr < oggi ? 'block' : 'none'; // Mostra solo eventi passati
      //console.log(`Evento ${dataEventoStr} (passato): `, dataEvento < oggi ? 'mostrato' : 'nascosto');
    } else {
      evento.style.display = 'block'; // Mostra tutti gli eventi
      //console.log(`Evento ${dataEventoStr} (tutti): mostrato`);
    }
  });
  //Restituisce un valore in base al numero selezionato
  //Uso questo valore per dare un titolo e informare utente su quale eventi sta guardando
  if (sceltaEventi === 'futuri') return 0;
  if (sceltaEventi === 'passati') return 1;
  return 2;
}

// Funzione per aggiornare il titolo nella pagina eventi
function aggiornaTitolo (tipo) {
  const titoloElement = document.getElementById("titoloEventi");
  if (tipo === 0) {
    titoloElement.textContent = "Cosa ci sarà nelle prossime settimane";
  } else if (tipo === 1) {
    titoloElement.textContent = "Cosa abbiamo organizzato fino ad ora";
  } else {
    titoloElement.textContent = "Tutti gli eventi";
  }
}


// FUNZIONI PER ANIMAZIONi
function typeEffect(elementID, text, speed, callback) {
  let index = 0;
  const element = document.getElementById(elementID);
  element.innerHTML = ''; // Pulisci l'elemento prima di iniziare

  function typeChar() {
    if (index < text.length) {
      element.innerHTML += text[index++];
      setTimeout(typeChar, speed);
    } else if (callback) {
      callback(); // Chiama il callback quando l'effetto è completo
    }
  }
  typeChar();
}

document.addEventListener('DOMContentLoaded', () => {
  // Anima l'elemento "heroCentro" con typeEffect
  typeEffect('heroCentro', 'stranamore', 150, () => {
    // Dopo 0,3 secondi dall'effetto, anima "heroSopra"
    setTimeout(() => {
      const heroSopra = document.getElementById('heroSopra');
      heroSopra.style.opacity = 1; // Mostra l'elemento
      heroSopra.classList.add('slide-in-right');

      // Dopo 0,3 secondi dall'animazione "heroSopra", anima "heroSotto"
      setTimeout(() => {
        const heroSotto = document.getElementById('heroSotto');
        heroSotto.style.opacity = 1; // Mostra l'elemento
        heroSotto.classList.add('slide-in-left');
      }, 800);
    }, 800);
  }, 3000);
});