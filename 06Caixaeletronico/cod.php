<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Atendimento - ThStore</title>
</head>

<body>
    <?php
    # Pegando dados fornecidos pelo usuário
    $valorCompra = isset($_GET["produto"]) ? $_GET["produto"] : 0;
    $forma_pag = isset($_GET["pag"]) ? $_GET["pag"] : "";
    $opcao = isset($_GET["op"]) ? $_GET["op"] : 0;

    # Moeda brasleira real para operação
    $padrao = numfmt_create("pt-BR", NumberFormatter::CURRENCY);
    ?>
    <header>
        <h1>ThStore Co<sup><small>®</small></sup></h1>
        <div class="logo">
            <img src="./assets/thStoreLogo.png" alt="logo">
        </div>
    </header>
    <main>
        <section>

            <?php

            switch ($opcao) {
                case 1:

                    if ($forma_pag === "1") {
                        $desconto = $valorCompra * 10 / 100;
                        $vlFinal = $valorCompra - $desconto;
                        echo "<fieldset>
                        <legend>Calculo de desconto</legend>
                        <p>Você obteve 10% de desconto por pagamento pix, resultando em " . numfmt_format_currency($padrao, $vlFinal, "BRL") . "</p>
                        </fieldset>";
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    } elseif ($forma_pag === "2" && $opcao === "1") {
                        $desconto = $valorCompra * 5 / 100;
                        $vlFinal = $valorCompra - $desconto;
                        echo "<fieldset>
                        <legend>Calculo de desconto</legend>
                        <p>Você obteve o 5% de desconto por pagamento em boleto, resultando em " . numfmt_format_currency($padrao, $vlFinal, "BRL") . "</p>
                        </fieldset>";
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    } else {
                        echo "<fieldset>
                        <legend>Calculo de desconto</legend>
                        
                        <p>Valor da sem descontos por pagamento em cartão, resultando no valor integral de " . numfmt_format_currency($padrao, $valorCompra, "BRL") . "</p></fieldset>";
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    }
                    break;
                case 2:
                    if ($forma_pag === "3") {
                        $acrescimo = $valorCompra * 8 / 100;
                        $vlFinal = $valorCompra + $acrescimo;
                        echo "<fieldset>
                        <legend>Calculo de acrescimo</legend>
                        
                        <p>Compra no crédito com juros em 8% resultando em " . numfmt_format_currency($padrao, $vlFinal, "BRL") . "</p></fieldset>";
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    } elseif ($forma_pag === "4") {
                        $acrescimo = $valorCompra * 12 / 100;
                        $vlFinal = $valorCompra + $acrescimo;
                        echo "<fieldset>
                        <legend>Calculo de acrescimo</legend>
                        
                        <p>Compras parceladas resultam em juros de 12%, resultando em " . numfmt_format_currency($padrao, $vlFinal, "BRL") . "</p></fieldset>";
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    } else {
                        echo "<fieldset>
                        <legend>Calculo de acrescimo</legend>
                        
                        <p>Valor sem acrescimos por pagamento em cartão debito, resultando no valor integral de " . numfmt_format_currency($padrao, $valorCompra, "BRL") . "</p></fieldset>";
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    }
                    break;
                case 3:
                    if ($forma_pag === "1") {
                        $desconto = $valorCompra * 10 / 100;
                        $vlFinal = $valorCompra - $desconto;
                        echo "
                        <fieldset>
                        <legend>Resumo de Compra</legend>
                            <ul>
                                <li>Valor inicial da compra: " . numfmt_format_currency($padrao, $valorCompra, "BRL") . "</li>
                                <li>Pagamento via: Pix</li>
                                <li>Valor total de desconto: " . numfmt_format_currency($padrao, $desconto,  "BRL") . " <small>(10%)</small></li>
                                <li>Valor total: " . numfmt_format_currency($padrao, $vlFinal, "BRL") . "</li>
                            </ul>
                        </fieldset>";
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    } elseif ($forma_pag === "2") {
                        $desconto = $valorCompra * 5 / 100;
                        $vlFinal = $valorCompra - $desconto;
                        echo "
                        <fieldset>
                        <legend>Resumo de Compra</legend>
                            <ul>
                                <li>Valor inicial da compra: " . numfmt_format_currency($padrao, $valorCompra, "BRL") . "</li>
                                <li>Pagamento via: Boleto</li>
                                <li>Valor total de desconto: " . numfmt_format_currency($padrao, $desconto,  "BRL") . " <small>(5%)</small></li>
                                <li>Valor total: " . numfmt_format_currency($padrao, $vlFinal, "BRL") . "</li>
                            </ul>
                        </fieldset>
                        ";
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    } elseif ($forma_pag === "3") {
                        $acrescimo = $valorCompra * 8 / 100;
                        $vlFinal = $valorCompra + $acrescimo;
                        echo "
                        <fieldset>
                        <legend>Resumo de Compra</legend>
                            <ul>
                                <li>Valor inicial da compra: " . numfmt_format_currency($padrao, $valorCompra, "BRL") . "</li>
                                <li>Pagamento via: Crédito</li>
                                <li>Valor total de juros: " . numfmt_format_currency($padrao, $acrescimo,  "BRL") . " <small>(8%)</small></li>
                                <li>Valor total: " . numfmt_format_currency($padrao, $vlFinal, "BRL") . "</li>
                            </ul>
                        </fieldset>
                        ";
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    } elseif ($forma_pag === "4") {
                        $acrescimo = $valorCompra * 12 / 100;
                        $vlFinal = $valorCompra + $acrescimo;
                        echo "
                        <fieldset>
                        <legend>Resumo de Compra</legend>
                            <ul>
                                <li>Valor inicial da compra: " . numfmt_format_currency($padrao, $valorCompra, "BRL") . "</li>
                                <li>Pagamento via: Crédito (Parcelado)</li>
                                <li>Valor total de juros: " . numfmt_format_currency($padrao, $acrescimo,  "BRL") . " <small>(12%)</small></li>
                                <li>Valor total: " . numfmt_format_currency($padrao, $vlFinal, "BRL") . "</li>
                            </ul>
                        </fieldset>
                        ";
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    } else {
                        echo "
                        <fieldset>
                        <legend>Resumo de Compra</legend>
                            <ul>
                                <li>Pagamento via: Debito</li>
                                <li>Valor total: " . numfmt_format_currency($padrao, $valorCompra, "BRL") . "</li>
                            </ul>
                        </fieldset>
                        ";
                        echo '<a href="javascript:history.go(-1)">Voltar</a>';
                    }
                    break;
                default:
                    echo '<h1 class="h1">Operação cancelada com sucesso!</h1>';
                    echo '<a href="javascript:history.go(-1)">Voltar</a>';
            }

            ?>

        </section>
    </main>
</body>

</html>