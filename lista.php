<?php
$filtro_lista = 1;

$listas = array();

$lista_teste = array();

$arquivo = fopen('arquivo.lcb', 'r');

while (!feof($arquivo)) {
    $registro = fgets($arquivo);

    $registro_dados = explode('#', $registro);

    if (count($registro_dados) < 5) {
        continue;
    }

    if (($registro_dados[5] != '1') && ($registro_dados[5] != '2') && ($registro_dados[5] != '3') && ($registro_dados[0] != 'Origem inválida') && ($registro_dados[1] != 'Origem inválida')) {
        $listas[] = $registro;
    }

    $lista_teste[] = $registro;
    
}

//   echo ' Nova lista <br>';
//   echo '<pre>';
//   print_r($listas);
//   echo '</pre>';
  

fclose($arquivo);


function montaArrayNovo($listas) {
    // Montagem de um array com chave e valor
    $novo_array = array();
    $tamanho_array = count($listas);
    $i = 0;
    
    foreach ($listas as $item) {
        $listas_dados = explode('#', $item);

        if (count($listas_dados) < 5) {
            continue;
        }
        if($i < $tamanho_array){
            $novo_array[$i]['loggi'] = $listas_dados[2];
            $novo_array[$i]['origem'] = $listas_dados[0];
            $novo_array[$i]['destino'] = $listas_dados[1];
            $novo_array[$i]['vendedor'] = $listas_dados[3];
            $novo_array[$i]['produto'] = $listas_dados[4];
            $novo_array[$i]['restricao'] = $listas_dados[5];
        }
        
        $i++;
    }

    return $novo_array;
}

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
    <div class="container">
        <header>
            <h1> Lista de pacotes </h1>
        </header>

        <section>
            <div class="busca">
                <form method="POST" action="">
                    <label for="listagem">Agrupar por:</label>
                    <select name="listagem" id="listagem" onchange="this.form.submit()">
                        <option value="" disabled selected>--select--</option>
                        <option value="1">Todos</option>
                        <option value="2">Região de destino</option>
                        <option value="3">Nº pacotes por vendedor</option>
                    </select>
                </form>

            </div>

            <div class="lista">
                <?php if ($_POST["listagem"] == 1) { ?>

                    <?php foreach ($listas as $item) { ?>
                        <?php
                        $listas_dados = explode('#', $item);

                        if (count($listas_dados) < 5) {
                            continue;
                        }

                        ?>
                        <div class="item">
                            <p>Código: <?= $listas_dados[2] ?></p>
                            <p>Região de origem: <?= $listas_dados[0] ?></p>
                            <p>Região de destino: <?= $listas_dados[1] ?></p>
                            <p>Código do vendedor do produto: <?= $listas_dados[3] ?></p>
                            <p>Tipo do produto: <?= $listas_dados[4] ?></p>
                            <hr>
                        </div>

                    <?php } ?>
                <?php } else if ($_POST["listagem"] == 2) { ?>
                    <?php
                        // Ordenar pela região de destino

                        $destino = montaArrayNovo($listas);
                        $ordenado = array();

                        foreach($destino as $key => $row){
                            $ordenado[$key] = $row['destino'];
                        }

                        array_multisort($ordenado, SORT_DESC, $destino);

                    ?>
                    <?php foreach($destino as $items){?>
                        <div class="item">
                            <p>Código: <?= $items['loggi'] ?></p>
                            <p>Região de origem: <?= $items['origem'] ?></p>
                            <p>Região de destino: <?= $items['destino'] ?></p>
                            <p>Código do vendedor do produto: <?= $items['vendedor'] ?></p>
                            <p>Tipo do produto: <?= $items['produto'] ?></p>
                            <hr>
                        </div>
                    <?php }?>
                <?php } else if ($_POST["listagem"] == 3) { ?>
                    <?php
                        // Ordenar pela região de destino

                        $destino = montaArrayNovo($listas);

                        $ordenado = array();

                        foreach($destino as $key => $row){
                            $ordenado[$key] = $row['vendedor'];
                        }

                        array_multisort($ordenado, SORT_DESC, $destino);

                        $numPacotesVendedor = array();

                        foreach($destino as $key => $vendedor) {
                            array_push($numPacotesVendedor, $vendedor['vendedor']);
                        }


                        $numPacotesVendedorAtualizado = array_count_values($numPacotesVendedor);


                    ?>

                    <?php foreach($numPacotesVendedorAtualizado as $chave => $valor){ ?>

                        <div class="item">
                            <p>Código do vendedor: <?= $chave ?></p>
                            <p>Quantidade de pacotes: <?= $valor ?></p>
                            <hr>
                        </div>

                    <?php } ?>

                <?php } ?>
            </div>

        </section>

    </div>
</body>

</html>