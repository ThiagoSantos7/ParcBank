<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>

<body>
    <div>
        <?php
        $num = $_GET["num"] ?? 0;

        do {
            if ($num % 2 != 0) {
                echo "Numero inválido: $num";
                break;
            } else {
                echo "Número válido: $num";
            }
        } while ($num % 2 != 0);

        ?>
        <br>
        <a href="javascript:history.go(-1)">Voltar</a>
    </div>
</body>

</html>