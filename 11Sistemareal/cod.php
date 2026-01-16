<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <title>Resultado</title>
</head>

<body>
    <?php
    $op = isset($_GET["opt"]) ? $_GET["opt"] : null;
    $peso = isset($_GET["peso"]) ? $_GET["peso"] : null;
    $altura = isset($_GET["alt"]) ? $_GET["alt"] : null;
    $p2 = isset($_GET["p2"]) ? $_GET["p2"] : null;
    ?>
    <header>
        <h1>Th Health | By Thdev<sup><small>tech</small></sup></h1>
    </header>

    <main>
        <section>
            <?php

            switch ($op) {
                case 1:
                    if ($peso === null && $altura === null) {
                        echo "
                        <h1>Calcule seu IMC</h1>
                        <form action='" . $_SERVER["PHP_SELF"] . "' method='get'>
                            <input type='hidden' name='opt' value='1'>
                            <label for='peso'>Peso:</label>
                            <input type='number' name='peso' step='0.01' min='0' max='400' required>
                            <label for='alt'>Altura:</label>
                            <input type='number' name='alt' step='0.01' min='0' max='2.99' required>
                            <input type='submit' class='btn' value='Calcular'>
                        </form>";
                    } else {
                        $imc = $peso / ($altura * $altura);
                        if ($imc < 18.5) {
                            echo "<h1>Resultado de IMC:</h1>
                                <ul>
                                    <li>Seu imc está em: <strong>" . number_format($imc, 2, ".", ",") . "</strong></li>
                                    <li>Peso: <strong>$peso</strong></li>
                                    <li>Altura: <strong>$altura</strong></li>
                                    <li>Observação: <strong>Você está muito abaixo do peso. Cuide-se!</strong></li>
                                </ul>
                            ";
                        } elseif ($imc < 25) {
                            echo "<h1>Resultado de IMC:</h1>
                                <ul>
                                    <li>Seu imc está em: <strong>" . number_format($imc, 2, ".", ",") . "</strong></li>
                                    <li>Peso: <strong>$peso</strong></li>
                                    <li>Altura: <strong>$altura</strong></li>
                                    <li>Observação: <strong>Você está no peso ideal. Continue assim!</strong></li>
                                </ul>
                            ";
                        } elseif ($imc < 30) {
                            echo "<h1>Resultado de IMC:</h1>
                                <ul>
                                    <li>Seu imc está em: <strong>" . number_format($imc, 2, ".", ",") . "</strong></li>
                                    <li>Peso: <strong>$peso</strong></li>
                                    <li>Altura: <strong>$altura</strong></li>
                                    <li>Observação: <strong>Você está com sobrepeso. Cuide-se!</strong></li>
                                </ul>
                            ";
                        } else {
                            echo "<h1>Resultado de IMC:</h1>
                                <ul>
                                    <li>Seu imc está em: <strong>" . number_format($imc, 2, ".", ",") . "</strong></li>
                                    <li>Peso: <strong>$peso</strong></li>
                                    <li>Altura: <strong>$altura</strong></li>
                                    <li>Observação: <strong>Você está com obesidade. Cuide-se!</strong></li>
                                </ul>
                            ";
                        }
                    }
                    break;
                case 2:

                    if ($p2 === null) {
                        echo "
                        <h1>Calcule quanto você deve tomar de água por dia!</h1>
                        <form action='" . $_SERVER["PHP_SELF"] . "' method='get'>
                        <input type='hidden' name='opt' value='2'>
                        
                        <label for='p2'>Peso:</label>
                        <input type='number' name='p2' min='0' max='400' required>
                        <input type='submit' class='btn' value='Calcular'>
                        </form>";
                    } else {
                        $result = $p2 * 0.035;
                        echo "
                        <h1>Resultado de água por peso:</h1>
                        <ul>
                            <li>Peso: <strong>$p2</strong></li>
                            <li>Litros de água por dia: <strong>" . number_format($result, 2, ".", ",") . "L</strong></li>
                        </ul>
                        ";
                    }
                    break;
                default:
                    echo "<h2>Opção inválida! Volte e escolha uma opção.</h2>";
            }
            ?>
        </section><br>
        <p><a href="javascript:history.go(-1)">Voltar</a></p>
    </main>
</body>

</html>