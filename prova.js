
function filtraEventi(sceltaEventi) {
  const oggi = new Date().toISOString().split('T')[0]; // Data odierna in formato YYYY-MM-DD
  const eventi = document.querySelectorAll('.evento-card'); // Seleziona tutte le card degli eventi
  // console.log("Data odierna (oggi):", oggi);
  eventi.forEach(evento => {
    const dataEventoStr = evento.getAttribute("data-evento"); // Data evento come stringa
    // const dataEvento = new Date(dataEventoStr); // Converti la data evento in oggetto Date
    // console.log("Data evento [dataEventoStr]:", dataEventoStr, "| Oggetto Date [dataEvento]:", dataEvento);
    if (sceltaEventi === 'futuri') {
      evento.classList.toggle('d-flex', dataEventoStr >= oggi); // Mostra solo eventi futuri
      evento.classList.toggle('d-none', dataEventoStr < oggi);
      // console.log(`Evento ${dataEventoStr} (futuro): `, dataEvento >= oggi ? 'mostrato' : 'nascosto');
    } else if (sceltaEventi === 'passati') {
      evento.classList.toggle('d-flex', dataEventoStr < oggi); // Mostra solo eventi passati
      evento.classList.toggle('d-none', dataEventoStr >= oggi);
      // console.log(`Evento ${dataEventoStr} (passato): `, dataEvento < oggi ? 'mostrato' : 'nascosto');
    } else {
      evento.classList.add('d-flex'); // Mostra tutti gli eventi
      evento.classList.remove('d-none');
      // console.log(`Evento ${dataEventoStr} (tutti): mostrato`);
    }
  });
  // Restituisce un valore in base al numero selezionato
  // Uso questo valore per dare un titolo e informare utente su quale eventi sta guardando
  if (sceltaEventi === 'futuri') return 0;
  if (sceltaEventi === 'passati') return 1;
  return 2;
}
