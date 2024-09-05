<!DOCTYPE html>
<html>
<head>
    <title>Classificação de Notas</title>
</head>
<body>
    <form method="post" action="">
        <label for="nota">Insira uma nota (0 a 10):</label>
        <input type="number" id="nota" name="nota" min="0" max="10" required>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nota = intval($_POST["nota"]);
        $classificacao = "";

        switch ($nota) {
            case 10:
                $classificacao = "A";
                break;
            case 9:
                $classificacao = "B";
                break;
            case 8:
            case 7:
                $classificacao = "C";
                break;
            case 6:
            case 5:
                $classificacao = "D";
                break;
            case 4:
            case 3:
            case 2:
            case 1:
            case 0:
                $classificacao = "E";
                break;
            default:
                $classificacao = "Nota inválida";
                break;
        }

        echo "<p>A classificação da nota $nota é: $classificacao</p>";
    }
    ?>
</body>
</html>
