<?php

    $listas = array();

    $arquivo = fopen('arquivo.lcb', 'r');

    while (!feof($arquivo)) {
        $registro = fgets($arquivo);

        $listas[] = $registro;
        
      }
    
      fclose($arquivo);

?>

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
            <?php foreach($listas as $item)  { ?>
                <?php 
                    $listas_dados = explode('#', $item); 
                    if(count($listas_dados) < 4) {
                        continue;
                    }
                ?>
                <div class="item">
                    <p>Código: <?= $listas_dados[0] ?></p>
                    <p>Região de origem: <?= $listas_dados[1] ?></p>
                    <p>Região de destino: <?= $listas_dados[2] ?></p>
                    <p>Código do vendedor do produto: <?= $listas_dados[3] ?></p>
                    <p>Tipo do produto: <?= $listas_dados[4] ?></p>
                    <hr>
                </div>
                
            <?php } ?> 
            </div>
           
        </section>

    </div>
</body>
</html>