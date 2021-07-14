<?php

    $origem = null;
    $destino = null;
    $codigo_loggi = null;
    $codigo_vendedor = null;
    $tipo_produto = null;
    $restricao = '0';

    // Restrições
    // 0 - Tudo ok
    // 1 - Produto inexistente
    // 2 - Impossibilidade de despachar (Jóia - Região origem - Centro-Oeste)
    // 3 - Código inválido (584)
    // 4 - Origem Sul - Brinquedos

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

    // Tamanho código 15
    $valida_codigo = strlen($_POST['codigo']);
    if($valida_codigo < 15 || $valida_codigo > 15) {
        header('Location: index.php?erro=CódigoInválido');
    }

    $codigo_formatado = str_split($_POST['codigo'],3);

    // echo '<pre>';
    // print_r($codigo_formatado);
    // echo '</pre>';

    foreach($regioes as $regiao){
        if($codigo_formatado[0] == $regiao['codigo']){
            $origem = $regiao['regiao'];
        }

        if($codigo_formatado[1] == $regiao['codigo']){
            $destino = $regiao['regiao'];
        }
    }

    if($origem == null) {
        $origem = 'Origem inválida';
    }

    if($destino == null) {
        $destino = 'Destino inválida';
    }

    $codigo_loggi = $codigo_formatado[2];

    $codigo_vendedor = $codigo_formatado[3];

    foreach($tipos_produtos as $produto){
        if($codigo_formatado[4] == $produto['codigo']){
            $tipo_produto = $produto['produto'];
        }
    }

    if($tipo_produto == null) {
        $tipo_produto = 'Produto inválido';
        $restricao = '1';
    }
    
    if($tipo_produto == 'Jóia' && $origem == 'Centro-oeste') {
        $restricao = '2';
    } 
    
    if($codigo_vendedor == '584') {
        $restricao = '3';
    } 

    if($tipo_produto == 'Brinquedos' && $origem == 'Sul') {
        $restricao = '4';
    }

    


    $texto = $origem.'#'.$destino.'#'.$codigo_loggi.'#'.$codigo_vendedor.'#'.$tipo_produto.'#'.$restricao. PHP_EOL;

    echo '<br>';
    echo $texto;

    $arquivo = fopen('arquivo.lcb', 'a');

    fwrite($arquivo,$texto);

    fclose($arquivo);

    echo 'Código cadastrado com sucesso!';

    echo '<br>';
    header('Location: lista.php?');
    
?>



<!-- Código: 888333555999000
Região de origem: Sudeste
Região de destino: Nordeste
Código Loggi: 555
Código do vendedor do produto: 999
Tipo do produto: Jóias -->

<!--
    Pacotes
 888555555123888
 333333555584333
 222333555124000   
 000111555874555
 111888555654777
 111333555123333
 555555555123888
 888333555584333
 111333555124000
 333888555584333
 555888555123000
 111888555123555
 888000555845333
 000111555874000
 111333555123555
-->