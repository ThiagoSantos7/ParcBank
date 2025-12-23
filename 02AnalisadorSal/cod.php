<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <title>Resultado</title>
</head>

<body>
    <?php
    # Salário bruto informado pelo usuário
    $bruto = isset($_GET["bruto"]) ? $_GET["bruto"] : 0;

    # Variável de conversão de moeda para real
    $padrao = numfmt_create("pt-BR", NumberFormatter::CURRENCY);

    # Condicionais da porcentagem de descontos
    if ($bruto <= 0) {
        echo "<h1>Salário inválido.<h1>";
        exit;
    } else if ($bruto <= 1500) {
        $inss = ($bruto * 8) / 100;
    } else if ($bruto >= 1501 && $bruto <= 3000) {
        $inss = ($bruto * 10) / 100;
    } else {
        $inss = ($bruto * 12) / 100;
    }

    # Condicional de Vale transporte
    if ($bruto > 2000) {
        $vt = ($bruto * 6) / 100;
    } else {
        $vt = 0;
    }

    # Calculo de descontos
    $total_desc = $inss + $vt;

    # Liquido final
    $liquido = $bruto - $total_desc;



    ?>
    <header>
        <h1>Salary Analyzer | By ThDev <sup><small>tech.</small></sup></h1>
    </header>
    <main>
        <section>
            <h1>Resultado</h1>
            <form>
                <ul>
                    <li>Salário bruto: <strong> <?= numfmt_format_currency($padrao, $bruto, "BRL") ?></strong></li>
                    <li>Desconto INSS:<strong><?= numfmt_format_currency($padrao, $inss, "BRL") ?></strong></li>
                    <li>Vale transporte: <strong> <?= numfmt_format_currency($padrao, $vt, "BRL") ?></strong></li>
                    <li>Total de descontos: <strong> <?= numfmt_format_currency($padrao, $total_desc, "BRL") ?></strong>
                    </li>
                    <li>Salário liquido: <strong> <?= numfmt_format_currency($padrao, $liquido, "BRL") ?></strong></li>
                </ul>
            </form>
            <p><a href="javascript:history.go(-1)">Voltar ao inicio</a></p>
        </section>
    </main>
</body>

</html>