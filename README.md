**PROBLEMA:**
organizzare la gestione dei problemi ai dispositivi assegnati ad ogni dipendete all'interno di un azienda 

**TARGET:**
aziende con manutentori  che devono organizzare la gestione dei problemi ai dispositivi assegnati ad ogni dipendente


**DIPENDENTE**
(<ins>matricola</ins>, email, nome, mansione, password)

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
(<ins>id_manutentore</ins>, nome, email, foto, password)

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

![er finito](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/ebc4fcc6-055c-43c0-ba6c-caf81797a0bb)



**Diagramma Relazionale**<br>
Dipendente(<ins>Matricola</ins>, mansione, nome, password)<br>
Richiesta(<ins>ID_richiesta</ins>, descrizione, data, stato, dipendente_Matricola, Cellulare_ID, Manutentore_ID)<br>
Cellulare(<ins>ID_Cellulare</ins>, Marca, Garanzia)<br>
Manutentore(<ins>ID_Manutentore</ins>, password, Nome, Foto, email)<br>
Problema(<ins>ID_problema</ins>, tipo, tempoRiparazione)<br>
Contiene(<ins>problema_id</ins>, <ins>richiesta_ID</ins>)<br>


**MOCKUP**
- invio richiesta da parte di un dipendente
- invio descrizione problema del cellulare
![mokup_invio_Richiesta](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/a5df0d14-0248-44ca-b59d-085c61040692)

- Accesso account Manutentore

![account_manu](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/eba1c1b1-f396-44f4-8528-e8cef579c067)

- accesso account dipendente
  
![account_dip](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/61fe4b1b-7bdb-48ad-a124-bea73aaf2b6a)


- Visulizzazione richieste di un manutentore
 
![elenco_richieste](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/0c5f0d5e-0ae0-4473-9627-05907aa9e3f7)


- Individuazione problema

  ![problema](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/cf5917b3-aa9c-4bc1-9667-c18c2bfbf260)

**CODICE SQL**

![SQL_Progetto](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/f42c3ecb-cefe-4ffa-aad0-db2b69a0c770)
