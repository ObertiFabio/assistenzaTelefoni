PROBLEMA:
Informatizzare e rendere più efficente il processo di riparazione o di sostituzione di un cellulare aziendale

TARGET:
dipendenti con problemi al cellulare aziendale


DIPENDENTE
(nome, cognome, <ins>matricola</ins>, mansione)

-----> Può effettuare una richiesta al manutentore in caso di problema.
       Comunica i suoi dati personali, il problema al cellulare aziendale.
       Ogni dipendente può inviare più richieste.
       
RICHIESTA
(<ins>id_richiesta</ins>, descrizione, data)

-----> La richiesta viene gestita grazie da una chiave id_richiesta, il dipendente fornisce una descrizione del problema 
       E' prsente anche un attributo data per specificare il momento nel quale è stata effettuata la richiesta
       
CELLULARE
(<ins>id_cellulare</ins>, marca,garanzia)

----->  E' assegnato ad un dipendente. In caso di necessità di sotituzione, esso va mandato in riparazione

MANUTENTORE
(nome, <ins>id_manutentore</ins>, disponibilità, titolo di studio)

----->  Riceve e gestisce le richieste di un dipendente. Una volta risolto il problema ritorna il dispositivo al proprietario.
        Ogni manutentore può gestire una singola richiesta alla volta.



- invio richiesta da parte di un dipendente
- invio descrizione problema del cellulare
- Accettazione da parte del manutentore
- Individuazione del problema
- Sistemazione dell'assegnamento al cellulare
- Conferma risoluzione problema
- Archiviazione della richiesta
- accesso account manutentore



**Diagramma Relazionale**<br>
Dipendente(<ins>Matricola</ins>,Nome, Cognome, Mansione, Richiesta_id)<br>
Richiesta(<ins>id_richiesta</ins>, Descrizione, Data)<br>
Manutentore(<ins>id_manutentore</ins>, Nome, Disponibilità, TitoloDiStudio, Richiesta_id, Cellulare_id)<br>
Cellulare(<ins>id_cellulare</ins>, Marca, Garanzia, Dipendente_matricola)
