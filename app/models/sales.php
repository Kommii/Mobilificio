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

function model_sales_products()
{
    $conn = db_connect();
    $sql = "SELECT pr.*, c.prezzoS from prodotto as pr inner join costituzione as c on pr.idProdotto=c.idProdotto inner join promozione as pro on c.idPromozione=pro.idPromozione where NOW() >= pro.dataI and NOW() <= pro.dataF";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $conn->close();
    return $rows;
}

?>