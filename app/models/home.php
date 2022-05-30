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

function model_products_top(){
  $conn = db_connect();
  $sql = "SELECT * FROM prodotto ORDER BY idCategoria LIMIT 3";
  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $conn->close();
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

function model_get_carrello_pacchetti($username)
{
  $mysqli = db_connect();
  $user = $mysqli->real_escape_string($username);
  $sql="SELECT pa.*, pra.quantita FROM cliente as c INNER JOIN carrello as ca on c.idCliente=ca.idCliente
  INNER JOIN presenzapa as pra on ca.idCarrello=pra.idCarrello
  INNER JOIN pacchetto as pa on pra.idPacchetto=pa.idPacchetto
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
  $ida = intval($idProdotto);
  $quantità = intval($quantita);
  $user = $mysqli->real_escape_string($username); 
  $idCarrello = get_id_cart();
  $cond = false;
  $ids = all_products_id_cart($idCarrello[0]);
  foreach($ids as $id){
    if($id['idProdotto'] == $idProdotto){
      $cond = true;
    }
  }
  if($cond == false){
  $sql = "INSERT INTO presenzapr(idProdotto, idCarrello, quantita) VALUES('$ida', '$idCarrello[0]', '$quantità')";
  }
  else{
    $sql = "UPDATE presenzapr SET quantita = $quantita WHERE idProdotto = $idProdotto";
  }
  $result = $mysqli -> query($sql);
    if(!$result)
    {
        echo $mysqli->error;
        exit();
    }
    $mysqli->close();
}

function all_products_id_cart($idCarrello){
  $mysqli = db_connect();
  $id=intval($idCarrello);
  $sql="SELECT pr.idProdotto from carrello as ca INNER JOIN presenzapr as pr on ca.idCarrello=pr.idCarrello where pr.idCarrello = $id";
  $result=$mysqli->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $mysqli->close();
  return $rows;
}

function all_packet_id_cart($idCarrello){
  $mysqli = db_connect();
  $id=intval($idCarrello);
  $sql="SELECT pa.idPacchetto from carrello as ca INNER JOIN presenzapa as pa on ca.idCarrello=pa.idCarrello where pa.idCarrello = $id";
  $result=$mysqli->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $mysqli->close();
  return $rows;
}

function model_insert_to_cartp($idPacchetto, $quantita, $username)
{

  $mysqli = db_connect();
  $id = intval($idPacchetto);
  $quantità = intval($quantita);
  $user = $mysqli->real_escape_string($username); 

  $idCarrello = get_id_cart();
  $cond = false;
  $ids = all_packet_id_cart($idCarrello[0]);
  foreach($ids as $id){
    if($id['idPacchetto'] == $idPacchetto){
      $cond = true;
    }
  }
  if($cond == false){
    $sql = "INSERT INTO presenzapa(idPacchetto, idCarrello, quantita) VALUES('$id', '$idCarrello[0]', '$quantità')";
  }
  else{
    $sql = "UPDATE presenzapa SET quantita = $quantita WHERE idPacchetto = $idPacchetto";
  }
  $result = $mysqli -> query($sql);
    if(!$result)
    {
        echo $mysqli->error;
        exit();
    }
    $mysqli->close();
}
?>