<?php
include('../modelo/conexao.php');
include('controle_session.php');



$descricao = $_POST['descricao'];
$quantidade_ativo = $_POST['quantidade'];
$marca_ativo= $_POST['marca'];
$tipo_ativo = $_POST['tipo'];
$observacao_ativo = $_POST['observacao'];
$user=$_SESSION['id_user'];


$query= "
    insert into ativo (
                    descricaoAtivo,
                    quantidadeAtivo,
                    statusAtivo,
                    idMarca,
                    idTipo,
                    observacaoAtivo,  
                    dataCadastroAtivo,
                    idUsuario)values(
                    '".$ativo."',
                    '".$quantidade_ativo."',
                    'S',
                    '".$marca_ativo."',
                    '".$tipo_ativo."',
                    '".$observacao_ativo."',
                    NOW(),
                    '".$user."',
                    
                                )

        ";

$result = mysqli_query($conexao, $query) or die(false);      


?>