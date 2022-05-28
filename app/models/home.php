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

function get_id_cart() {
  $mysqli = db_connect();
  $user = $mysqli->real_escape_string($_SESSION['username']); 
  $sql="SELECT ca.idCarrello from carrello as ca INNER JOIN cliente as cl on ca.idCliente=cl.idCliente WHERE cl.username = '$user'";
  $result=$mysqli->query($sql);
  $rows = $result->fetch_row();
  $result->free();
  $mysqli->close();
  return $rows;
}

function model_insert_to_cart($idProdotto, $quantita, $username)
{
  $mysqli = db_connect();
  $id = intval($idProdotto);
  $quantità = intval($quantita);
  $user = $mysqli->real_escape_string($username); 
  $idCarrello = get_id_cart();
  $sql = "INSERT INTO presenzapr(idProdotto, idCarrello, quantita) VALUES('$id', '$idCarrello[0]', '$quantità')";
  $result = $mysqli -> query($sql);
    if(!$result)
    {
        echo $mysqli->error;
        exit();
    }
    $mysqli->close();
}
?>