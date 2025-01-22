<?php
include_once('../modelo/conexao.php');

// Verifica se o ID foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idTipo'])) {
    $idTipo = $_POST['idTipo'];

    // Deletar o ativo do banco de dados
    $sql = "DELETE FROM tipo WHERE idTipo = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $idTipo);

    if (mysqli_stmt_execute($stmt)) {
        // Redirecionar após a exclusão com uma mensagem de sucesso
        header('Location: ../visao/tipos.php?delete=success');
    } else {
        // Caso haja erro ao deletar
        header('Location: index.php?delete=error');
    }

    mysqli_stmt_close($stmt);
} else {
    // Caso o ID não seja passado corretamente
    header('Location: index.php?delete=error');
}
?>