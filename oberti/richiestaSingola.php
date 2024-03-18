<html>
<body>
<?php
    session_start();
    require 'connessione.php';



    if (!isset($_SESSION['matricola'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }
    
    $id_richiesta=$_GET["id_richiesta"];
    $sql = "SELECT * FROM richiesta WHERE id_richiesta = ? and stato = 'presa in carico'";
    $query = $connessione->prepare($sql);
    $query->bind_param("s", $id_richiesta);
    $query->execute();
    $result = $query->get_result();
    $richieste = $result->fetch_assoc();
    echo "<div data-id='{$richieste['id_richiesta']}'>";
    echo "<p><strong>Id richiesta:</strong> {$richieste['id_richiesta']}</p>";
    echo "<p><strong>Matricola:</strong> {$richieste['dipendente_matricola']}</p>";
    echo "<p><strong>Descrizione:</strong> {$richieste['descrizione']}</p>";
    echo "<p><strong>Data:</strong> {$richieste['data']}</p>";
    echo "<p><strong>Stato:</strong> {$richieste['stato']}</p>";
    echo "</div>";

?>

<button>Gestisci</button>
<a href='visualizzaRichiesteManutentore.php'><button>Torna indietro</button></a>
<div id="divDaRiempire"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
  $("button").click(function(){
    $.ajax({url: "gestioneProblema.php?id_richiesta=<?php echo $richieste['id_richiesta']?>", success: function(result){
      $("#divDaRiempire").html(result);
    }});
  });
});
</script>

</body>
</html>
