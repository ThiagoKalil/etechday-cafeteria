<?php

  include "../../../controller/conexao.php" ;

  $resposta = array( ) ;

  $nome = $_REQUEST["NOME"];
$custo = $_REQUEST["CUSTO"];
$codigoBarra = $_REQUEST["CODIGO_DE_BARRAS"];

  

$sql = "
    insert into produto (NOME, CUSTO, CODIGO_DE_BARRAS)
    values
    ('". $nome . "', '". $custo ."', '". $codigoBarra . "')";


  $retornoBanco = mysqli_query( $conn, $sql ) ;

  if( !$retornoBanco ){

    $resposta["status"] = -1 ;
    $resposta["msg"]    = "ocorreu um erro na execução do WS. cod=1002" ;

  } else{

    $resposta["status"] = 0 ;
    $resposta["msg"]    = "success" ;
    $resposta["last_id"] = mysqli_insert_id( $conn ) ;

  }

  echo json_encode( $resposta ) ;
  exit ;

?>
