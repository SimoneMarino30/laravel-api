21/4

- Milestone 1
nome repo 1: laravel-api
Aggiungiamo al nostro progetto Laravel una nuovo Api/ProjectController. Questo controller risponderà a delle richieste via API e si occuperà di restituire la lista dei progetti presenti nel database in formato json. ✔

- Milestone 2
Testiamo la chiamata API tramite Postman e assicuriamoci di ricevere i dati correttamente. ✔

- Milestone 3
nome repo 2: vite-boolfolio
Iniziamo ad occuparci della parte front-office della nostra applicazione: creiamo un nuovo progetto Vue 3 con Vite e installiamo axios. Colleghiamo questo progetto ad una repo separata.

- Milestone 4
Nel componente principale della nostra Vue App facciamo una chiamata API all’endpoint costruito nel progetto Laravel (milestone 1) e recuperiamo tutti i progetti dal nostro back-end. Stampiamo in console i risultati e verifichiamo di ricevere i dati correttamente.

- Milestone 5
Creiamo un nuovo componente ProjectCard, che corrisponde ad una card per visualizzare un progetto. Utilizziamo questo componente per visualizzare tutti i progetti ricevuti tramite API.
Bonus: Gestire la paginazione dei risultati
Buon lavoro e buon divertimento!

26/4

**Lato Laravel assicuratevi di:**
- Aver aggiunto la funzione show all'Api\ProjectController ✔
- Aver recuperato le informazioni aggiuntive col il metodo with di Eloquent ✔
- Aver testato con postman il corretto funzionamento della API ✔

**Lato Vue assicuratevi di:**
- Aver installato Vue Router: npm install vue-router@4 ✔
- Aver creato un nuovo file per gestire le rotte (router.js o router/index.js) ✔
- Aver creato dei componenti "pagina" nella cartella pages ✔
- Aver importato il file per le rotte ed averlo aggiunto all'istanza Vue (file main.js) ✔
- Aver inserito il componente <router-view /> in app.vue ✔
- Aver inserito le voci di menu dinamicamente con i <router-link> nelle card dei progetti ✔
- Aver inserito la pagina di dettaglio che legge il parametro :id o :slug e fa una chiamata coerente alla API preparata precedentemente
- Visualizzare correttamente le informazioni ricevute

**BONUS:**
- Realizzare un Loader
- Gestire eventuali errori 404 (nelle chiamate axios e nel router)