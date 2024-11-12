<link rel="stylesheet" href="login.css">

<?php
session_start();


$usuarios = [
    'admin' => '$2y$10$CwTycUXWrV3W7pTq4q2FPuC0j5Bd6U8z8HZWuH.GZXpmv6p7DHLqy' 
    // senha: 123456
];


function verificar_login() {
    return isset($_SESSION['usuario_logado']);
}


function logout() {
    session_unset();  
    session_destroy();  
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if (!verificar_login()) {

            if (isset($usuarios[$usuario]) && password_verify($senha, $usuarios[$usuario])) {
                $_SESSION['usuario_logado'] = $usuario;
                $mensagem = "Login realizado com sucesso!";
            } else {
                $mensagem = "Usuário ou senha inválidos.";
            }
        } else {
            $mensagem = "Já existe um usuário logado. Faça logout para logar com outro usuário.";
        }
    }

    if (isset($_POST['logout'])) {
        logout();
        $mensagem = "Logout realizado com sucesso!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Controle de Usuários</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 300px; margin: 0 auto; padding-top: 50px; }
        .form-container { margin-bottom: 20px; }
        .form-container input { width: 100%; padding: 10px; margin-bottom: 10px; }
        .form-container button { width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        .form-container button:hover { background-color: #45a049; }
        .message { text-align: center; margin-bottom: 20px; color: red; }
        .logged { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Controle de Usuários</h2>
    
    <?php if (verificar_login()): ?>
        <div class="logged">
            <p>Bem-vindo, <?php echo $_SESSION['usuario_logado']; ?>!</p>
            <form method="POST">
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>
    <?php else: ?>
        <div class="form-container">
            <h3>Login</h3>
            <?php if (isset($mensagem)): ?>
                <p class="message"><?php echo $mensagem; ?></p>
            <?php endif; ?>
            <form method="POST">
                <input type="text" name="usuario" placeholder="Usuário" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit" name="login">Entrar</button>
            </form>
        </div>
    <?php endif; ?>
</div>

</body>
</html>