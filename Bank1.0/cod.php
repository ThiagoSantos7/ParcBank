<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Reusultado</title>
</head>

<body>
    <?php
    #Valores informados pelo usuário 
    $valor = isset($_GET["valor"]) ? $_GET["valor"] : 0;
    $parcelas = isset($_GET["parc"]) ? $_GET["parc"] : 0;

    #Formatação de moeda para real
    $padrao = numfmt_create("pt-BR", NumberFormatter::CURRENCY);

    #Lógica 
    $result = $valor / $parcelas;

    #Condicionais em questão de juros
    if ($parcelas <= 3) {
        $mensagem = "<strong>" . numfmt_format_currency($padrao, $result, "BRL") . "</strong> abaixo de 3 parcelas não obtem juros";
    } else if ($parcelas >= 4 && $parcelas <= 6) {
        $juros = $result + ($result * 5 / 100);
        $mensagem = "juros aplicados de <strong> 5% </strong> resultando em: <strong>" . numfmt_format_currency($padrao, $juros, "BRL") . "</strong>";
    } else if ($parcelas >= 7 && $parcelas <= 12) {
        $juros = $result + ($result * 10 / 100);
        $mensagem = "juros aplicados de <strong> 10% </strong> resultando em: <strong>" . numfmt_format_currency($padrao, $juros, "BRL") . "</strong>";
    } else {
        $mensagem = "parcelas acima de 12 não são permitidas";
    }

    ?>
    <header>
        <h1>ParcBank | By ThDev <sup><small>tech</small></sup> </h1>
    </header>
    <main>
        <section>
            <h2>Resultado de parcelas</h2>

            <p>Analisando o valor de informado de:
                <strong><?= numfmt_format_currency($padrao, $valor, "BRL") ?></strong> você tem:
            </p>
            <ul>
                <li><strong><?= $parcelas ?></strong> parcelas.</li>
                <li>Valor subtotal: <strong><?= numfmt_format_currency($padrao, $result, "BRL") ?></strong></li>
                <li>Valor total <?= $mensagem ?></li>
            </ul><br>

            <form>
                <h4>TEBELA DE JUROS</h4>
                <table>
                    <tr>
                        <th>Parcelas</th>
                        <td>1 a 3</td>
                        <td>Sem juros</td>
                    </tr>
                    <tr>
                        <th>Parcelas</th>
                        <td>4 a 6</td>
                        <td>5% de juros</td>
                    </tr>
                    <tr>
                        <th>Parcelas</th>
                        <td>7 a 12</td>
                        <td>10% de juros</td>
                    </tr>
                </table>
            </form><br>
            <p><a href="javascript:history.go(-1)">Voltar ao inicio</a></p>
        </section>
    </main>
</body>

</html>