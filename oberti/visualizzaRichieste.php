<html>
<body>
<script>
     function eliminaRichiesta(id){
            var id_richiesta = id;
            //richiesta all api per rimozione da database
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "eliminaRichiesta.php", true);
            xhr.send(JSON.stringify({id_richiesta:id_richiesta}));

            xhr.onload = function() {
                //controllo che la richiesta sia andata a buon fine
                if (this.status == 200 && this.readyState == 4) {
                    //modifiche al dom
                    document.getElementById(id_richiesta).remove();
                    console.log("eliminata");
                } else {
                    console.log("Errore");
                }
            };
    }
</script>

<?php
    session_start();
    require 'connessione.php';

    if (!isset($_SESSION['matricola'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }
    

    $ruolo = $_SESSION['ruolo'];
    $manutentore_id = $_SESSION['matricola'];
    $sql = "SELECT * FROM richiesta WHERE stato = 'inviata'";
    $query = $connessione->prepare($sql);
    if($ruolo == 'manutentore'){
        $query->execute();
        $result = $query->get_result();
        if($result->num_rows == 0){
            echo "<p>Nessuna richiesta da visualizzare</p>";
        }else{
            while($richieste = $result->fetch_assoc()){
                echo "<div data-id='{$richieste['id_richiesta']}'>";
                echo "<p><strong>Id richiesta:</strong> {$richieste['id_richiesta']}</p>";
                echo "<p><strong>Matricola:</strong> {$richieste['dipendente_matricola']}</p>";
                echo "<p><strong>Descrizione:</strong> {$richieste['descrizione']}</p>";
                echo "<p><strong>Data:</strong> {$richieste['data']}</p>";
                echo "<p><strong>Stato:</strong> {$richieste['stato']}</p>";
                echo "<button type='button' id='pac'>Presa a carico</button>";
                echo "<hr>";
                echo "</div>";
            
            }
        }
    }
    else if($ruolo == 'amministratore'){
        $query->execute();
        $result = $query->get_result();
        if($result->num_rows == 0){
            echo "<p>Nessuna richiesta da visualizzare</p>";
        }else{
            while($richieste = $result->fetch_assoc()){
                echo "<div id='{$richieste['id_richiesta']}'>";
                echo "<p><strong>Id richiesta:</strong> {$richieste['id_richiesta']}</p>";
                echo "<p><strong>Matricola:</strong> {$richieste['dipendente_matricola']}</p>";
                echo "<p><strong>Descrizione:</strong> {$richieste['descrizione']}</p>";
                echo "<p><strong>Data:</strong> {$richieste['data']}</p>";
                echo "<p><strong>Stato:</strong> {$richieste['stato']}</p>";
                echo "<button type='button' onclick='eliminaRichiesta({$richieste['id_richiesta']})'>Elimina richiesta</button>";
                echo "</div>";
                echo "<hr>";
            }
        }
    }
    
?>

<script>
    const prendiInCarico = async function(e){
        const id_richiesta = e.target.parentNode.dataset.id;
        const res = await fetch("update_manutentore.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },    
            body: `id=${id_richiesta}`
        });
        e.target.remove();
        const html = `
            <p>Presa a carico confermata!</p>
        `;
        e.target.parentNode.insertAdjacentHTML("beforeend", html);
    }
    
    
const buttons = document.querySelectorAll("#pac");
buttons.forEach(btn => btn.addEventListener("click", prendiInCarico));
    
</script>

<a href="index.php">Torna alla Home</a>

</body>
</html>