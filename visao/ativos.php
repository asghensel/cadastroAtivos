<?php 
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
include('menu.php');
include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');

$marcas=busca_info_bd($conexao,'marca');
$tipos=busca_info_bd($conexao,'tipo');
$sql="SELECT idAtivo, 
descricaoAtivo, 
quantidadeAtivo, 
quantidadeMinima,
statusAtivo, 
observacaoAtivo, 
`dataCadastroAtivo`, 
urlImagem,
(SELECT descricaoMarca FROM marca m WHERE m.idMarca = a.idMarca) as marca,
(SELECT descricaoTipo FROM tipo t WHERE t.idTipo = a.idTipo) as tipo,  
(SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = a.idUsuario) as usuario

FROM ativo a";

$result = mysqli_query($conexao, $sql) or die(false);
$ativos = $result->fetch_all(MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/cadastroAtivo.css">
    <script src="../js/ativos.js"></script>
    <title>Cadastro_ativos</title>
</head>
<body>

<div class="container">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="fechar_modal()" data-bs-target="#exampleModal" id="modal">Cadastrar Modal</button>
<form method="GET" action="../controle/buscarProdutos.php" class="form-busca">
    <input type="text" name="busca" placeholder="Buscar produto no Mercado Livre" required>
    <button type="submit">Buscar</button>
</form>
<div class="container" id="form">

<table class="table">
<thead>
  <tr >
    <th scope="col">Descrição</th>
    <th scope="col">Quantidade</th>
    <th scope="col">Qntd. Min.</th>
    <th scope="col">Marca</th>
    <th scope="col">Tipo</th>
    <th  id="obs" scope="col">Observação</th>
    <th id="data" scope="col">Data</th>
    <th scope="col">Usuario</th>
    <th scope="col">Imagem</th>
    <th scope="col">Ações</th>
    
    
  </tr>
</thead>
<tbody>
    <?php
    foreach($ativos as $ativo){
        ?>
    <tr>

        
      <td><?php echo $ativo['descricaoAtivo']; ?></td>
      <td id="quantia"><?php echo $ativo['quantidadeAtivo']; ?></td>
      <td id="quantia"><?php echo $ativo['quantidadeMinima']; ?></td>
      <td><?php echo $ativo['marca']; ?></td>
      <td><?php echo $ativo['tipo']; ?></td>
      <td id="obs"><?php echo $ativo['observacaoAtivo']; ?></td>
      <td id="data"><?php 
    $dataCadastro = $ativo['dataCadastroAtivo'];
    echo date('d/m/Y H:i:s', strtotime($dataCadastro)); 
    ?></td>
      <td><?php echo $ativo['usuario']; ?></td>
      <td>
      <button data-bs-target="#modalImagens" data-bs-toggle="modal" type="button" id="modalImg" onclick="verImagem('<?php echo $ativo['urlImagem']; ?>')">
            <img src="http://localhost:8080/<?php echo $ativo['urlImagem']; ?>" style="width: 90px; height: 90px; margin:auto;" id="imagemGrande">
      </button>

      </td>
    
    
      <td> 
      <div class="acoes" style="display: flex; justify-content: space-between;">
      <div class="muda_status">
          <?php
            if($ativo['statusAtivo']=="S"){
              ?>
              <div class="inativo" onclick="muda_status('N', '<?php echo $ativo['idAtivo'] ?>')">
              <i class="bi bi-toggle-on" ></i>
              </div>
          <?php      
            }else{
               ?> 
              <div class="ativo" onclick="muda_status('S', '<?php echo $ativo['idAtivo'] ?>')">
                <i class="bi bi-toggle-off"></i>
              </div>
              <?php
            }
          ?>
      </div>
    
      <div class="edit">
      <i class="bi bi-pencil-square" onclick="editar('<?php echo $ativo['idAtivo'] ?>')"></i>
      </div>

      <div class="trash">
      <i class="bi bi-trash" onclick="deletar('<?php echo $ativo['idAtivo'] ?>')"></i>
      </div>

    </td>
          </tr>
        
    
        
    
    <?php
}
?>
</div>

  </tbody>
  </table>


<input type="hidden" id="idAtivo" value="">

</div>
<?php 
include_once('modal_ativos.php');
include_once('modal_imagens.php');
?>
</div>
</body>
</html>