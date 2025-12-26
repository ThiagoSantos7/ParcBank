<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Resultado da solicitação</title>
</head>

<body>
    <?php

    # Seleçãoo de opção fornecida pelo usuário
    $op = isset($_GET["op"]) ? $_GET["op"] : "";
    $saque = isset($_GET["saque"]) ? $_GET["saque"] : 0;
    $deposito = isset($_GET["dep"]) ? $_GET["dep"] : 0;

    # Padrão de moeda
    $padrao = numfmt_create("pt-BR", NumberFormatter::CURRENCY);

    # Salário inicial fixo
    $saldo_fixo = 1000;

    ?>
    <header>
        <h1>ThBank | By ThDev <sup><small>tech</small></sup></h1>
    </header>
    <main>
        <section>
            <?php

            switch ($op) {
                case 1:
                    echo "<p>Seu saldo atual está em: <strong>" . numfmt_format_currency($padrao, $saldo_fixo, "BRL") . "</strong></p><br>";
                    echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    break;
                case 2:

                    if ($saque === 0) {
                        echo '<form method="get" action ="' . $_SERVER["PHP_SELF"] . '">
                        <input type="hidden" name="op" value="2">
                        <label for="saque">Digite o valor do saque:</label>
                        <input type="number" name="saque" min="1" step="0.01" required>
                        <input type="submit" value="Sacar">
                        </form>';
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    } else {

                        if ($saque > 0 && $saque <= $saldo_fixo) {
                            $saldoR = $saldo_fixo - $saque;
                            echo "<p>Saque efetuado com sucesso</p>";
                            echo "<p>Novo saldo: " . numfmt_format_currency($padrao, $saldoR, "BRL") . "</p>";
                            echo '<a href="javascript:history.go(-1)">Voltar</a>';
                        } else {
                            echo "<p>Valor inválido ou saldo insuficiente</p>";
                        }
                    }
                    break;
                case 3:
                    $saldoAdd = $saldo_fixo + $deposito;

                    if ($deposito === 0) {
                        echo '<form method="get" action="' . $_SERVER["PHP_SELF"] . '">
                        <input type="hidden" name="op" value="3">
                        <label for="dep">Digite o valor de deposito:</label>
                        <input type="number" name="dep" step="0.01" min="1" required>
                        <input type="submit" value="Depositar"><br>
                        ';
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    } else {
                        if ($deposito > 0) {
                            echo "<p>Depósito efetuado com sucesso!</p>";
                            echo "<p>Saldo atualizado em: " . numfmt_format_currency($padrao, $saldoAdd, "BRL") . "</p><br>";
                            echo '<a href="javascript:history.go(-1)">Voltar</a>';
                        } else {
                            echo "<p>Valor invalido!</p>";
                        }
                    }
                    break;
                case 4:
                    echo "<h2>Atendimento encerrado. Obrigado por usar o ThBank</h2>";
                    break;
                default:
                    echo "Opção inválida!<br>";
                    echo '<a href="javascript:history.go(-1)">Voltar ao atendimento</a>';
            }

            ?>
        </section>
    </main>
</body>

</html>