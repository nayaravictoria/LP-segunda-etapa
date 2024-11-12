<?php

    include "conexao.php";

    if(isset($_POST['id'])){
        
        //entrada
        $id = $_POST['id'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $estoque = $_POST['estoque'];


        //processamento
        $sql = "update produto set descricao = '$descricao', preco = '$preco', estoque = '$estoque' where id = '$id'";
        $alterar = mysqli_query($conexao,$sql);


        //saída - 
        if($alterar){
            echo "
                <script>
                    alert('Registro Alterado com Sucesso!');
                    window.location = 'listar_produtos.php';
                </script>
            ";
        }
        else{
            echo "
                <p> Banco de Dados Temporariamente fora do ar. Tente novamente mais tarde. </p>
                <p> Entre em contato com o administrador do Site ... </p>
            ";
            echo mysqli_error($conexao);
        }
    }else{//tratamento de erro e redirecionamento
        echo "
            <p> Esta é uma página de tratamento de dados. </p>
            <p> Clique <a href='listar_produtos.php'> aqui </a> para a acessar a lista de produtos cadastrados. </p>
        ";
    }


?>