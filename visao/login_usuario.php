<?php
session_start();
if(isset($_GET['erro']) && $_GET['erro'] =='acesso_negado'){
  echo "<script>alert('Usuario não autenticado'); </script>";
}
if(isset($_GET['error_auten']) && $_GET['error_auten']=='s'){
  echo "<script>alert('Senha ou usuario invalido!');</script>";
}

include_once('../modelo/conexao.php');
include_once('cabecalho.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/loginUsuario.css">
  <title>Login</title>
</head>
<body>
  
</body>
</html>
<body>
<div class="container">
<form action="../controle/login_usuario_controle.php" method="post" id="formulario">
  <div class="box">
  <h1 id="title">Login</h1>
      <div class="mb-2">
    <label for="nome" class="form-label">Nome Usuario</label>
    <input type="text"  class="form-control" id="nome" placeholder="Digite seu nome aqui" name="usuario" required >
  </div>
  <div class="mb-2">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" class="form-control" id="senha" placeholder="Digite sua senha aqui" name="senha" required >
  </div>
  
  <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>


</div> 
</body>
</html>