<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container" >
        <header>
            <h1> Lista de códigos </h1>
        </header>

        <section>

            <div class="lista">
                <p>Código: <?= $origem ?></p>
                <p>Região de origem: <?= $destino ?></p>
                <p>Região de destino: <?= $codigo_loggi ?></p>
                <p>Código do vendedor do produto: <?= $codigo_vendedor ?></p>
                <p>Tipo do produto: <?= $tipo_produto ?></p>
            </div>
           
        </section>

    </div>
</body>
</html>