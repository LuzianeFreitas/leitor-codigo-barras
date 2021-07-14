<?php

    $origem = null;
    $destino = null;
    $codigo_loggi = null;
    $codigo_vendedor = null;
    $tipo_produto = null;

    $regioes = array(
        array('regiao' => 'Centro-oeste', 'codigo' => '111'),
        array('regiao' => 'Nordeste', 'codigo' => '333'),
        array('regiao' => 'Norte', 'codigo' => '555'),
        array('regiao' => 'Sudeste', 'codigo' => '888'),
        array('regiao' => 'Sul', 'codigo' => '000')
    );

    $tipos_produtos = array(
        array('produto' => 'Jóias', 'codigo' => '000'),
        array('produto' => 'Livros', 'codigo' => '111'),
        array('produto' => 'Eletrônicos', 'codigo' => '333'),
        array('produto' => 'Bebidas', 'codigo' => '555'),
        array('produto' => 'Brinquedos', 'codigo' => '888'),
    );

    $codigo_formatado = str_split($_POST['codigo'],3);


    foreach($regioes as $regiao){
        if($codigo_formatado[0] == $regiao['codigo']){
            $origem = $regiao['regiao'];
        }

        if($codigo_formatado[1] == $regiao['codigo']){
            $destino = $regiao['regiao'];
        }
    }

    $codigo_loggi = $codigo_formatado[2];

    $codigo_vendedor = $codigo_formatado[3];

    foreach($tipos_produtos as $produto){
        if($codigo_formatado[4] == $produto['codigo']){
            $tipo_produto = $produto['produto'];
        }
    }


    
    // header('Location: lista.php');
    
?>



<!-- Código: 888333555999000
Região de origem: Sudeste
Região de destino: Nordeste
Código Loggi: 555
Código do vendedor do produto: 999
Tipo do produto: Jóias -->