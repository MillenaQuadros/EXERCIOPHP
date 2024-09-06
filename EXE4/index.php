<!DOCTYPE html>
<html>
<head>
    <title>Calculadora em PHP</title>
</head>
<body>
    <form method="post">
        <input type="number" name="num1" placeholder="Número 1" required>
        <input type="number" name="num2" placeholder="Número 2" required>
        <select name="operation">
            <option value="add">Adicionar</option>
            <option value="sub">Subtrair</option>
            <option value="mul">Multiplicar</option>
            <option value="div">Dividir</option>
        </select>
        <button type="submit" name="submit">Calcular</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];

        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                break;
            case "sub":
                $result = $num1 - $num2;
                break;
            case "mul":
                $result = $num1 * $num2;
                break;
            case "div":
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Erro: Divisão por zero";
                }
                break;
            default:
                $result = "Operação inválida";
                break;
        }
        echo "Resultado: $result";
    }
    ?>
</body>
</html>
