<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "1234") {
        echo "Login bem-sucedido";
    } else {
        echo "Login ou senha incorretos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Login</title>
</head>
<body>
    <form method="post" action="">
        Nome de usuário: <input type="text" name="username"><br>
        Senha: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
