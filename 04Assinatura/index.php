<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>ThFlix - ThDev</title>
</head>

<body>
    <header>
        <h1>ThFlix - <span>By ThDev</span> <sup><small><img src="./img/icons8-pipoca-64.png" alt="pipoca"></small></sup>
        </h1>
    </header>
    <main>
        <section>
            <h2>Escolha sua assinatura e comece já!</h2>
            <form action=" <?= $_SERVER["PHP_SELF"] ?>" method="get">
                <label for="plano">Escolha um plano:</label>
                <select name="plano" id="plano">
                    <option value="select">Selecione</option>
                    <option value="1">Básico</option>
                    <option value="2">Padrão</option>
                    <option value="3">Premium</option>
                </select>
                <input class="btn" type="submit" value="Verificar plano">
            </form>
        </section><br>
        <section>

            <?php
            $plano = $_GET["plano"] ?? "";
            $moeda = numfmt_create("pt-BR", NumberFormatter::CURRENCY);

            switch ($plano) {
                case 1:
                    $basico = 50;
                    echo "<h2>Plano Básico fornece</h2>
                        <ul>
                        <li>Valor inicial: <strong>" . numfmt_format_currency($moeda, $basico, "BRL") . "</strong></li>
                        <li>Descontos do plano (isento): <strong>R$ 0,00</strong></li>
                        <li>Valor total: <strong>" . numfmt_format_currency($moeda, $basico, "BRL") . "</strong></li>
                        </ul>";
                    break;
                case 2:
                    $padrao = 80;
                    $desconto = $padrao * 10 / 100;
                    $total = $padrao - $desconto;
                    echo "<h2>Plano Padrão fornece</h2>
                        <ul>
                            <li>Valor inicial: <strong>" . numfmt_format_currency($moeda, $padrao, "BRL") . "</strong></li>
                            <li>Descontos do plano (10%): <strong>" . numfmt_format_currency($moeda, $desconto, "BRL") . "</strong></li>
                            <li>Valor total: <strong>" . numfmt_format_currency($moeda, $total, "BRL") . "</strong></li>
                        </ul>";
                    break;
                case 3:
                    $premium = 120;
                    $desconto = $premium * 20 / 100;
                    $total = $premium - $desconto;
                    echo "<h2>Plano Premium fornece</h2>
                        <ul>
                            <li>Valor inicial: <strong>" . numfmt_format_currency($moeda, $premium, "BRL") . "</strong></li>
                            <li>Descontos do plano (20%): <strong>" . numfmt_format_currency($moeda, $desconto, "BRL") . "</strong></li>
                            <li>Valor total: <strong>" . numfmt_format_currency($moeda, $total, "BRL") . "</strong></li>
                        </ul>";
                    break;
                default:
                    echo "<h3>Escolha um plano</h3>";
            }
            ?>
        </section>
    </main>
</body>

</html>