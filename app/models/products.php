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
  $sql = "SELECT * FROM prodotto ORDER BY idCategoria";
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

function model_products_delete($id)
{
  $conn = db_connect();
  $idProd = intval($id);
  $sql = "DELETE FROM prodotto WHERE idProdotto='$idProd'";
  $result = $conn -> query($sql);
    if(!$result)
    {
        echo $conn->error;
        exit();
    }
    $conn->close();
}

function model_products_update($id, $nome, $descrizione, $lunghezza, $larghezza, $altezza, $immagine, $prezzoV)
{
  $conn = db_connect();
  $idProd = intval($id);
  $sql = "UPDATE prodotto SET nome = '$nome' , descrizione = '$descrizione' , lunghezza = $lunghezza , larghezza = $larghezza , altezza = $altezza , immagine = '$immagine' , prezzoV = $prezzoV WHERE idProdotto = $id";
  $result = $conn -> query($sql);
    if(!$result)
    {
        echo $conn->error;
        exit();
    }
    $conn->close();
}

?>