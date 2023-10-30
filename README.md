**PROBLEMA:**
Informatizzare e rendere più efficente il processo di riparazione di un cellulare aziendale

**TARGET:**
dipendenti con problemi al cellulare aziendale


**DIPENDENTE**
(nome, cognome, <ins>matricola</ins>, mansione)

-----> Può effettuare una richiesta al manutentore in caso di problema.
       Comunica la sua matricola e  il problema al cellulare aziendale.
       Ogni dipendente può inviare più richieste.
       
**RICHIESTA**
(<ins>id_richiesta</ins>, descrizione, data, stato)

-----> La richiesta viene gestita grazie da una chiave id_richiesta, il dipendente fornisce una descrizione del problema 
       E' prsente anche un attributo data per specificare il momento nel quale è stata effettuata la richiesta
       
**CELLULARE**
(<ins>id_cellulare</ins>, marca,garanzia)

----->  E' assegnato ad un dipendente. In caso di necessità di sotituzione, esso va mandato in riparazione

**MANUTENTORE**
(nome, <ins>id_manutentore</ins>, disponibilità, titolo di studio, foto)

----->  Riceve e gestisce le richieste di un dipendente. Una volta risolto il problema ritorna il dispositivo al proprietario.
        Ogni manutentore può gestire una singola richiesta alla volta.

**PROBLEMA**
(<ins>ID_problema</ins>, tipo, tempoRiparazione)

-----> Il manutentore capisce di quale problema si tratta e lo comunica tramite l'attributo "tipo", e fornisce anche un tempo di riparazione 
       indicativo

- invio richiesta da parte di un dipendente
- invio descrizione problema del cellulare
- Accesso account Manutentore
- accesso account dipendente
- Visulizzazione richieste di un manutentore
- Individuazione problema


**Diagramma ER**

![diagramma ER](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/5fecf8ee-9ec5-4c93-8cbb-7a7b5dcf0a3a)


**Diagramma Relazionale**<br>
Dipendente(<ins>Matricola</ins>, mansione, nome, cognome)<br>
Richiesta(<ins>ID_richiesta</ins>, descrizione, data, stato, dipendente_Matricola, Cellulare_ID, Manutentore_ID)<br>
Cellulare(<ins>ID_Cellulare</ins>, Marca, Garanzia)<br>
Manutentore(<ins>ID_Manutentore</ins>, Titolo_studio, Nome, Foto, Disponibilità)<br>
Problema(<ins>ID_problema</ins>, tipo, tempoRiparazione)<br>
Contiene(<ins>problema_id</ins>, <ins>richiesta_ID</ins>)<br>


**MOCKUP**
- invio richiesta da parte di un dipendente
- invio descrizione problema del cellulare
![mokup_invio_Richiesta](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/a5df0d14-0248-44ca-b59d-085c61040692)

- Accesso account Manutentore
![mokup_account](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/bb45545c-ce42-4bd8-a99a-7dc8a351ca86)


- accesso account dipendente
  
![mokupAccesso_dipendente](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/6fd98591-82b5-4ed8-987e-b24fffb9a98a)

- Visulizzazione richieste di un manutentore
 
![mokup_progetto](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/38e2d7a4-eb6c-47c9-9f16-2f3d581e2350)

- Individuazione problema

  ![mockup_problema](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/cc77552a-1d28-4db5-ba3d-eef65e962c38)
