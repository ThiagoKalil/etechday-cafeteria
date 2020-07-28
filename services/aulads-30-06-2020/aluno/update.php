<?php
include '../../../controller/conexao.php';

$resposta = array( ) ;

$nome = $_REQUEST["NOME"];
$cidade = $_REQUEST["CIDADE"];
$dataNasc = $_REQUEST["DATA_NASCIMENTO"];
$id = $_REQUEST["ID"];

$sql = "UPDATE aluno 
SET NOME     = '".$nome."', CIDADE   = '".$cidade."', DATA_NASCIMENTO = '".$dataNasc."' WHERE ID = ".$id."
";

  $retornoBanco = mysqli_query( $conn, $sql ) ;

  if( !$retornoBanco ){

    $resposta["status"] = -1 ;
    $resposta["msg"]    = "ocorreu um erro na execução do WS. cod=1002" ;

  } else {

    $resposta["status"] = 0 ;
    $resposta["msg"]    = "success" ;
    $resposta["last_id"] = mysqli_insert_id( $conn ) ;

  }

  echo json_encode( $resposta ) ;
  exit ;

?> 