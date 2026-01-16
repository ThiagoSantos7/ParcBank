<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma de numeros pares</title>
</head>

<body>
    <div>
        <h1>Soma de numeros pares</h1>
        <p>De o seu número e ele ira somar 2 em cada número que passar antes dele.</p>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <label for="num">Digite um número:</label>
            <input type="number" name="num" placeholder="Ex: 10" min="1" max="100" required>
            <input type="submit" value="Calcular" class="bnt">
        </form>
    </div>
    <br>
    <div>
        <form>
            <?php
            $num = isset($_POST["num"]) ? $_POST["num"] : 0;
            $contador = 1;
            $soma = 0;

            if ($num === "") {
                echo "Valor inválido, tente novamente.";
            } else {
                while ($contador <= $num) {
                    $soma += $contador;
                    $contador++;
                }
                echo "Resultado: $soma";
            }

            ?>
        </form>
    </div>
</body>

</html>