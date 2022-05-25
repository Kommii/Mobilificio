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

function model_products_all()
{
  $conn = db_connect();
  $sql = "SELECT * FROM prodotto ORDER BY idProdotto";
  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $conn->close();
  return $rows;
}

function model_products_detail($id)
{
  $conn = db_connect();
  $idProd = intval($id);
  $sql = "SELECT * FROM prodotto WHERE idProdotto='$idProd'";
  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC)[0];
  $result->free();
  $conn->close();
  return $rows;
}

?>