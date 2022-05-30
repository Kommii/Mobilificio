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

function model_packets_all()
{
    $conn = db_connect();
    $sql = "SELECT * FROM pacchetto";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $conn->close();
    return $rows;
}

function model_packets_allproducts($idPacchetto)
{
    $conn = db_connect();
    $id=intval($idPacchetto);
    $sql = "SELECT pr.* from pacchetto as pa inner join appartenenza as a on pa.idPacchetto=a.idPacchetto
    inner join prodotto as pr on a.idProdotto=pr.idProdotto
    where pa.idPacchetto=$id";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $conn->close();
    return $rows;
}

function model_presenzapa_delete($id)
{
  $conn = db_connect();
  $idPa = intval($id);
  $sql = "DELETE FROM presenzapa WHERE idPacchetto='$idPa'";
  $result = $conn -> query($sql);
    if(!$result)
    {
        echo $conn->error;
        exit();
    }
    $conn->close();
}

function model_packets_search($nome)
{
  $conn = db_connect();
  $pacchetto = $conn -> real_escape_string($nome);
  $sql = "SELECT * FROM pacchetto
  WHERE nomePa like '%$pacchetto%'";
  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $conn->close();
  return $rows;
}

?>