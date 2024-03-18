<!DOCTYPE html>
<html>
    <head>
    </head>
<body>
    <h1>Resoconto problema</h1>
    <form method="POST" action="gestioneProblemaController.php">
    <input type="hidden" name="id_richiesta" value=' <?php echo $_GET["id_richiesta"] ?>'>
    
    <label for="tipo">Inserisci il tipo di problema:</label>
        <input type="text" name="tipo" id="tipo" required><br>

        <label for="tempo_riparazione">Inserisci il tempo di riparazione:</label>
        <input type="text" name="tempo_riparazione" id="tempo_riparazione" required><br>

        
        <input type="submit" value="Invia resoconto problema">
    </form>
    
</body>
</html>