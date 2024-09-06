<?php
session_start();


if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 0;
}

function exibirFormulario() {
    echo '<form method="post" action="">
        <label>Escolha uma opção:</label><br>
        <input type="radio" name="opcao" value="1"> Ver Saldo<br>
        <input type="radio" name="opcao" value="2"> Depositar<br>
        <input type="radio" name="opcao" value="3"> Sacar<br>
        <input type="radio" name="opcao" value="4"> Sair<br>
        <input type="submit" value="Enviar">
    </form>';
}

function processarEscolha($opcao) {
    switch ($opcao) {
        case 1:
            echo "Seu saldo atual é: R$ " . $_SESSION['saldo'] . "<br>";
            break;
        case 2:
            echo '<form method="post" action="">
                <label>Digite o valor para depositar:</label>
                <input type="number" name="valor" step="0.01" required>
                <input type="hidden" name="opcao" value="2">
                <input type="submit" value="Depositar">
            </form>';
            break;
        case 3:
            echo '<form method="post" action="">
                <label>Digite o valor para sacar:</label>
                <input type="number" name="valor" step="0.01" required>
                <input type="hidden" name="opcao" value="3">
                <input type="submit" value="Sacar">
            </form>';
            break;
        case 4:
            echo "Obrigado por usar nosso sistema. Até logo!";
            session_destroy();
            exit;
        default:
            echo "Opção inválida!<br>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['opcao'])) {
        $opcao = (int)$_POST['opcao'];
        if ($opcao == 2 || $opcao == 3) {
            if (isset($_POST['valor'])) {
                $valor = (float)$_POST['valor'];
                if ($opcao == 2) {
                    $_SESSION['saldo'] += $valor;
                    echo "Depósito de R$ $valor realizado com sucesso!<br>";
                } elseif ($opcao == 3) {
                    if ($valor <= $_SESSION['saldo']) {
                        $_SESSION['saldo'] -= $valor;
                        echo "Saque de R$ $valor realizado com sucesso!<br>";
                    } else {
                        echo "Saldo insuficiente para saque!<br>";
                    }
                }
            }
        }
        processarEscolha($opcao);
    }
} else {
    exibirFormulario();
}
?>
