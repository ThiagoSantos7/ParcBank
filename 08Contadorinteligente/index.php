<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contador inteligente</title>
</head>

<body>
    <?php
    # Pegando informações dadas pello usuário
    $vl = isset($_POST["vl"]) ? $_POST["vl"] : 0;
    ?>
    <div>
        <h1>Contador de números pares</h1>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <label for="vl">Digite um número:</label>
            <input type="number" name="vl" placeholder="Ex: 2" min="1" max="100" step="1" required>
            <input type="submit" value="Calcular" class="btn">
        </form>
    </div>
    <br>
    <div>
        <h1>Resultado</h1>
        <form>
            <?php
            # Contador, o numero do calculo.
            $contador = 2;

            # Estrutura de repetição para contar até o nnúmero informado pelo usuário.
            if ($vl % 2 == 0) {
                echo "Números pares encontrados: <br><br>";
                while ($contador <= $vl) {
                    echo "<strong>$contador  </strong>";
                    $contador += 2;
                }
            } else {
                echo "Insira um valor par";
            }

            ?>
        </form>
    </div>
</body>

</html>