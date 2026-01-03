<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma com while</title>
</head>

<body>
    <?php
    $valor = isset($_GET["vl"]) ? $_GET["vl"] : 0;
    ?>
    <div>
        <h1>Somador de número real</h1>
        <p>Digite um numero e ele sera somado de 1 até o mesmo.</p>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="get">
            <label for="vl">Digite um numero de 1 a 100:</label>
            <input type="number" name="vl" placeholder="Ex: 50" min="1" max="100" required>
            <input type="submit" value="Somar">
        </form>
    </div><br>
    <div>
        <h2>Resultado</h2>
        <form>
            <?php
            $somador = 0;
            $contador = 1;

            while ($contador <= $valor) {
                $somador += $contador;
                $contador++;
            }

            echo "$somador";


            ?>
        </form>
    </div>
</body>

</html>