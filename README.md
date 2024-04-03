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


- Accesso account Manutentore ✔
- Accesso account dipendente ✔
- Accesso account amministratore ✔
- Visualizzazione account dipendente ✔
- Visualizzazione account manutentore ✔
- Visualizzazione account amministratore ✔
- Invio richiesta da parte di un dipendente ✔
- Registrazione di un manutentore da parte dell'amministratore ✔
- Registrazione di un cellulare da parte dell'amministratore ✔
- eliminazione di una richiesta da parte dell'amministratore ✔
- Presa carico di una richiesta da parte di un manutentore ✔
- Visulizzazione richieste di un manutentore ✔
- visualizzazione richieste in sospeso di un dipendente ✔
- ricerca richieste inviate da un dipendente ✔
- invio scheda problema da parte di un manutentore ✔
- Individuazione problema ✔


**Diagramma ER**

![diagramma](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/116f37ac-caee-4896-a571-01fc445ecf40)




**Diagramma Relazionale**<br>
Dipendente(<ins>Matricola</ins>, mansione, email, nome, password)<br>
Richiesta(<ins>ID_richiesta</ins>, descrizione, data, stato, dipendente_Matricola, Cellulare_ID, Manutentore_ID)<br>
Cellulare(<ins>ID_Cellulare</ins>, Marca, Garanzia)<br>
Manutentore(<ins>ID_Manutentore</ins>, password, Nome, Foto, email)<br>
Problema(<ins>ID_problema</ins>, tipo, tempoRiparazione)<br>
Contiene(<ins>problema_id</ins>, <ins>richiesta_ID</ins>)<br>

**Istruzioni per far funzionare il programma**
- Avere XAMPP in locale
- Inserire la cartella "oberti" presente nel repository nella cartella htdocs
- Creare un database di nome "oberti"
- Eliminare nell'sql le righe commentate per evitare l'errore di sintassi 
- Utlizzare il file .sql presente nella cartella "oberti" presente nel repository e creare le varie tabelle

  
**(ATTENZIONE! la funzione "invio richiesta da parte di un dipendente" è funzionante ma mancano nella tabella le foreign key "Manutentore_ID" e "Cellulare_ID" dato che non sono state ancora implementate!)**


**MOCKUP**
- invio richiesta da parte di un dipendente
- invio descrizione problema del cellulare
![dipendente_invioRichiesta](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/5fdf8e96-3c27-4027-8af0-f4aa442c16e7)

- Accesso account Manutentore

![account_manu](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/eba1c1b1-f396-44f4-8528-e8cef579c067)

- accesso account dipendente
  
![account_dip](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/61fe4b1b-7bdb-48ad-a124-bea73aaf2b6a)


- Visulizzazione richieste di un manutentore
 

![manutentore_visualizza](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/d0c75998-08f1-4078-bba1-4ef4732f35c2)


- Individuazione problema

 ![manutentore_problema](https://github.com/ObertiFabio/assistenzaTelefoni/assets/101709153/67c49ef5-c522-4d15-b5bd-e3465b365882)



