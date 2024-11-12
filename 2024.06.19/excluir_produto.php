<?php

    include "conexao.php";

    if(isset($_GET['id'])){
        //entrada - recebe os dados
        $id = $_GET['id']; 

        //processamento - escreve e executa a sql
        $sql = "delete from produto where id = '$id'";
        $excluir = mysqli_query($conexao,$sql);

        //saida - feedback ao usuário e redirecionar a página
        if($excluir){
            echo "
                <script> 
                    alert('Registro Excluído com Sucesso!');
                    window.location = 'listar_produtos.php';
                </script>
            ";
            //redirecionamento de páginas pelo php
            //header('location: listar_produtos.php');
        }
        else{
            echo "
                <p> Banco de Dados Temporariamente fora do ar. Tente novamente mais tarde. </p>
                <p> Entre em contato com o administrador do Site ... </p>
            ";
            echo mysqli_error($conexao);
        }
    }
    else{//tratamento de erro e redirecionamento
        echo "
            <p> Esta é uma página de tratamento de dados </p>
            <p> Clique <a href='listar_produtos.php'> aqui </a> para a acessar a lista de produtos cadastrados. </p>
        ";
    }
?>