<!DOCTYPE html>
<html>
<head>
    <title>Verificação de Idade</title>
</head>
<body>
    <form method="post" action="">
        <label for="data_nascimento">Data de Nascimento (1994-06-28):</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required>
        <input type="submit" value="Verificar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data_nascimento = $_POST['data_nascimento'];
        $data_atual = new DateTime();
        $data_nascimento = new DateTime($data_nascimento);
        $idade = $data_atual->diff($data_nascimento)->y;

        if ($idade < 18) {
            echo "<p>Você não pode se cadastrar. Idade: $idade anos.</p>";
        } else {
            echo "<p>Cadastro permitido. Idade: $idade anos.</p>";
        }
    }
    ?>
</body>
</html>