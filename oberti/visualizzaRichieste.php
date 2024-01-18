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
        while($richieste = $result->fetch_assoc()){
            echo "<div data-id='{$richieste['id_richiesta']}'>";
            echo "<p><strong>Id richiesta:</strong> {$richieste['id_richiesta']}</p>";
            echo "<p><strong>Matricola:</strong> {$richieste['dipendente_matricola']}</p>";
            echo "<p><strong>Descrizione:</strong> {$richieste['descrizione']}</p>";
            echo "<p><strong>Data:</strong> {$richieste['data']}</p>";
            echo "<p><strong>Stato:</strong> {$richieste['stato']}</p>";
            echo "<button type='button' id='pac'>Presa a carico</button>";
            echo "</div>";
            echo "<hr>";
        }
    }
    else if($ruolo == 'amministratore'){
        $query->execute();
        $result = $query->get_result();
        while($richieste = $result->fetch_assoc()){
            echo "<div><strong>Id richiesta:</strong> {$richieste['id_richiesta']}</div>";
            echo "<div><strong>Matricola:</strong> {$richieste['dipendente_matricola']}</div>";
            echo "<div><strong>Descrizione:</strong> {$richieste['descrizione']}</div>";
            echo "<div><strong>Data:</strong> {$richieste['data']}</div>";
            echo "<div><strong>Stato:</strong> {$richieste['stato']}</div>";
            echo "<hr>";
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
    /*
    var label = document.createElement("label"); // Create a label element
    label.textContent = "Presa a carico confermata"; // Set the text of the label
    this.parentNode.appendChild(label); // Append the label to the parent of the button
    var id_richiesta = 2;
    fetch("update_manutentore.php"),{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },    
        body: 'id_richiesta=' + id_richiesta
        
    }    
});    
*/
const buttons = document.querySelectorAll("#pac");
buttons.forEach(btn => btn.addEventListener("click", prendiInCarico));
    
</script>


<a href="index.php">Torna alla Home</a>

