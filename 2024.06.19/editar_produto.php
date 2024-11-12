<?php
    include "conexao.php";

    if(isset($_GET['id'])){
        //entrada
        $id = $_GET['id'];

        //processamento
        $sql = "select * from produto where id = $id";
        $seleciona = mysqli_query($conexao,$sql); //executa a sql
        $exibe = mysqli_fetch_array($seleciona); //carrega o vetor com o banco de dados

        //carrega as variaveis com dados do banco - opcional
        $descricao = $exibe['descricao'];
        $preco = $exibe['preco'];
        $estoque = $exibe['estoque'];

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="mt-3 text-center">Editar Produtos</h1>
        <hr>
        <form name="cadastro" method="post" action="update_produto.php">
            <input type="hidden" name="id" value="<?=$id?>">

            <div class="mb-3">
                <label for="descricao" class="form-label">Descriçao</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="<?=$descricao?>" required>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" class="form-control" id="preco" name="preco" 
                value="<?php echo $preco?>" required>
            </div>

            <div class="mb-3">
                <label for="estoque" class="form-label">Estoque</label>
                <input type="number" class="form-control" id="estoque" name="estoque" value="<?=$estoque?>"required>
            </div> 

            <div class="mb-3 text-end">
                <button type="button" class="btn btn-warning" onclick="history.go(-1)">Voltar</button>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
        
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<?php
    }
    else{//tratamento de erro e redirecionamento
        echo "
            <p> Esta é uma página de tratamento de dados. </p>
            <p> Clique <a href='listar_produtos.php'> aqui </a> para a acessar a lista de produtos cadastrados. </p>
        ";
    }
?>