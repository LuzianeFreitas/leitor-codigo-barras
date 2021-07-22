# Leitor de código de barras

<p>
O processo de separação de pacotes para envio acontece de
modo automático, uma esteira inteligente lê o código de barras dos pacotes e os agrupa pelas regiões de destino. O código de barras do pacote é composto por 15 dígitos, onde cada trinca numérica representa uma informação do pacote.
</p>

## Trincas

1. Região de Origem
2. Região de Destino
3. Código da Loggi
4. Código do Vendedor do produto
5. Tipo do produto

## Região

Região->Código<br>
Centro-oeste->111<br>
Nordeste->333<br>
Norte->555<br>
Sudeste->888<br>
Sul->000<br>

## Produto

Tipo do Produto->Código<br>
Jóias->000<br>
Livros->111<br>
Eletrônicos->333<br>
Bebidas->555<br>
Brinquedos->888<br>

## Restrições

- [x] Não envia produtos que não sejam dos tipos acima informados.
- [x] Não é possível despachar pacotes contendo jóias tendo como região de origem o Centro-oeste;
- [x] O vendedor 584 está com seu CNPJ inativo e, portanto, não pode mais enviar pacotes pela Loggi, os códigos de barra que estiverem relacionados a este vendedor devem ser considerados inválidos.

## Features

- [x] Identificar o destino de cada pacote.
- [x] Saber quais pacotes possuem códigos de barras válidos e/ou inválidos.
- [x] Identificar se algum pacote que tem como origem a região Sul tem Brinquedos em seu conteúdo.
- [ ] Listar os pacotes agrupados por região de destino (Considere apenas pacotes válidos).
- [ ] Listar o número de pacotes enviados por cada vendedor (Considere apenas pacotes válidos).
- [ ] Gerar o relatório/lista de pacotes por destino e por tipo (Considere apenas pacotes válidos).

