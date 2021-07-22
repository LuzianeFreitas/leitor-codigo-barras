<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitor de código de barras</title>
</head>
<body>
    <div class="container" >
        <header>
            <h1> Verificador de código de barras de pacotes</h1>
        </header>

        <section>
            <div class="formulario">
                <form action="valida-codigo.php" method="post">
                    <label>Código de barras</label>
                    <input name="codigo" type="text">
                    <button type="submit">Consultar</button>
                </form>
            </div> 
            <div class="lista">
                <a href="lista.php">Pacotes</a>
                <a href="">Gerar Relatório</a>
            </div>        
        </section>

    </div>
</body>
</html>