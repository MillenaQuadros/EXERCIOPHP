<!DOCTYPE html>
<html>
<head>
    <title>Par ou Ímpar</title>
</head>
<body>
    <form method="post" action="">
        Digite um número: <input type="number" name="numero" required>
        <input type="submit" value="Verificar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        
        if ($numero % 2 == 0) {
            echo "<p>$numero é par.</p>";
        } else {
            echo "<p>$numero é ímpar.</p>";
        }
    }
    ?>
</body>
</html>