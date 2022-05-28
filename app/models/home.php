<?php
include_once("../app/config.php");

function db_connect()
{
  $conn = new mysqli(SERVER, USER, PASS, DB);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function model_get_user($username)
{
    $mysqli = db_connect();
    $user = $mysqli->real_escape_string($username);
    $sql="SELECT * FROM cliente WHERE username='$user'";
    $result=$mysqli->query($sql);
    $rows = $result -> fetch_row();
    $result -> free_result();
    $mysqli -> close();
    return $rows;
}

function model_get_carrello_prodotti($username)
{
  $mysqli = db_connect();
  $user = $mysqli->real_escape_string($username);
  $sql="SELECT p.*, pre.quantita FROM cliente as c INNER JOIN carrello as ca on c.idCliente=ca.idCliente
  INNER JOIN presenzapr as pre on ca.idCarrello=pre.idCarrello
  INNER JOIN prodotto as p on pre.idProdotto=p.idProdotto
  where c.username='$user'";
  $result=$mysqli->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $result->free_result();
  $mysqli->close();
  return $rows;
}

?>