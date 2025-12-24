<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Resultado do calculo</title>
</head>

<body>
    <?php
    # Salário bruto dado pelo usuário
    $sal = isset($_GET["sal"]) ? $_GET["sal"] : 0;

    # Padrão de moeda brasileira
    $padrao = numfmt_create("pt-BR", NumberFormatter::CURRENCY);

    # Calculo de desconto de INSS (Condicionais)
    if ($sal <= 1500) {
        $inss = ($sal * 8) / 100;
    } elseif ($sal >= 1501 && $sal < 3000) {
        $inss = ($sal * 10) / 100;
    } else {
        $inss = ($sal * 12) / 100;
    }

    # Total salário com desconto de inss
    $subtotal = $sal - $inss;

    # Calculo de IRRF com base no subTotal

    if ($sal <= 2000) {
        $irrf = 0;
    } elseif ($subtotal >= 2001 && $subtotal < 3000) {
        $irrf = ($subtotal * 7.5) / 100;
    } else {
        $irrf = ($subtotal * 15) / 100;
    }

    # Total de descontos
    $total_desc = $inss + $irrf;

    # Salário liquido
    $liquido = $sal - $total_desc;

    ?>
    <header>
        <h1>ParcBank | By ThDev <sup><small>tech.</small></sup></h1>
    </header>
    <main>
        <section>
            <h2>Resultado de calculo</h2>
            <form>
                <ul>
                    <li>Salário informado: <strong><?= numfmt_format_currency($padrao, $sal, "BRL") ?></strong></li>
                    <li>Desconto total INSS: <strong><?= numfmt_format_currency($padrao, $inss, "BRL") ?></strong></li>
                    <li>Desconto total IRRF: <strong><?= numfmt_format_currency($padrao, $irrf, "BRL") ?></strong></li>
                    <li>Seu salário liquido será de:
                        <strong><?= numfmt_format_currency($padrao, $liquido, "BRL") ?></strong>
                    </li>
                </ul>
            </form><br>
            <a href="javascript:history.go(-1)">Voltar</a>
        </section>

    </main>

</body>

</html>