<?php

$listas = array();

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

}


fclose($arquivo);


function montaArrayNovo($listas)
{
    // Montagem de um array com chave e valor
    $novo_array = array();
    $tamanho_array = count($listas);
    $i = 0;

    foreach ($listas as $item) {
        $listas_dados = explode('#', $item);

        if (count($listas_dados) < 5) {
            continue;
        }
        if ($i < $tamanho_array) {
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
    <title>Leitor de código de barras | Lista</title>
</head>

<body>
    <div class="container">
        <header>
            <h1> Lista de pacotes </h1>
        </header>

        <section>
            <div class="lista">
                <table>
                    <thead>
                        <tr>
                            <th>Loggi</th>
                            <th>Origem</th>
                            <th>Destino</th>
                            <th>Vendedor</th>
                            <th>Produto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $lista_nova = montaArrayNovo($listas);

                        foreach ($lista_nova as $item) {
                        ?>
                            <tr>
                                <td><?= $item['loggi'] ?></td>
                                <td><?= $item['origem'] ?></td>
                                <td><?= $item['destino'] ?></td>
                                <td><?= $item['vendedor'] ?></td>
                                <td><?= $item['produto'] ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </section>

    </div>
</body>

</html>