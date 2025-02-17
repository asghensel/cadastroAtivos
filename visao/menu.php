<?php

include_once('../controle/controle_session.php');
include_once('cabecalho.php');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar com Submenu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/menu.css">
    <script src="../js/menu.js"></script>
</head>
<body>
    <nav>
        <ul>
            <div class="navbar">
                <li><img src="../midia/senac_logo_branco.png"></li>
                <li><a href="telaInicial.php"><div class="navbar-item" data-menu="menu1">Início</div></a></li>
                <li>
                    <div class="navbar-item" data-menu="menu2">
                        Usuarios
                        <div class="submenu">
                            <a href="cadastrarusuario.php">Cadastrar</a>
                            <a href="listar_usuario.php">Listagem</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="navbar-item" data-menu="menu3">
                        Cadastrar
                        <div class="submenu">
                            <a href="ativos.php">Ativos</a>
                            <a href="marcas.php">Marcas</a>
                            <a href="tipos.php">Tipos</a>
                        </div>
                        
                    </div>
                </li>
                <li><a href="movimentacao_ativo.php"><div class="navbar-item" data-menu="menu4">Movimentação</div></a></li>
                <li><a href="relatorios.php"><div class="navbar-item" data-menu="menu5">Relatórios</div></a></li>
                <li id="logout">
                    <div class="navbar-item">
                        <a class="logout-link" onclick="logoutUser()">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </div>
        </ul>
    </nav>
</body>
</html>
