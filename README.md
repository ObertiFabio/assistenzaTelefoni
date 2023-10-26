PROBLEMA:
Informatizzare e rendere più efficente il processo di riparazione o di sostituzione di un cellulare aziendale

TARGET:
dipendenti con problemi al cellulare aziendale


DIPENDENTE
(nome, cognome, (<ins>matricola</ins>), mansione)

-----> Può effettuare una richiesta al manutentore in caso di problema.
       Comunica i suoi dati personali, il problema al cellulare aziendale.
       Ogni dipendente può inviare più richieste.
       
RICHIESTA
((<ins>id_richiesta</ins>, descrizione, data)

-----> La richiesta viene gestita grazie da una chiave id_richiesta, il dipendente fornisce una descrizione del problema 
       E' prsente anche un attributo data per specificare il momento nel quale è stata effettuata la richiesta
       
CELLULARE
((<ins>id_cellulare</ins>), marca,garanzia)

----->  E' assegnato ad un dipendente. In caso di necessità di sotituzione, esso va mandato in riparazione

MANUTENTORE
(nome, (<ins>id_manutentore</ins>), disponibilità, titolo di studio)

----->  Riceve e gestisce le richieste di un dipendente. Una volta risolto il problema ritorna il dispositivo al proprietario.
        Ogni manutentore può gestire una singola richiesta alla volta.



- invio richiesta da parte di un dipendente
- Accettazione da parte del manutentore
- Individuazione del problema
- Sistemazione dell'assegnamento al cellulare
- Conferma risoluzione problema
- Archiviazione della richiesta


MOCKUP:
https://www.figma.com/file/WJ7dYeNht5lB1BrytkAcye/Assistenza-Telefoni?type=design&node-id=0%3A1&mode=design&t=OEnEaTCg1jcz8l0f-1
