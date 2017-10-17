<?php
require_once 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$estado = $_POST['estado'];

$sql = "UPDATE categorias
        SET nome='{$nome}',
            descricao='{$descricao}',
            estado='{$estado}'
        WHERE id = '{$id}'";
$resultado = mysqli_query($conexao, $sql);
if($resultado){
  header("Location:listar-categorias.php?sucesso=Alterado+com+Sucesso!");
  die();
}
