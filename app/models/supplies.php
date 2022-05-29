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

function model_supplies_all()
{
    $conn = db_connect();
    $sql = "SELECT f.idFornitura, f.quantita, f.data, f.costo, fp.nome as azienda, pr.nome as prodotto FROM fornitriceproduttrice as fp inner join fornitura as f on fp.idFornProd=f.idFornProd
    inner join prodotto as pr on f.idProdotto=pr.idProdotto
    order by f.data desc";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $conn->close();
    return $rows;
}

function model_supplies_moreproducts()
{
    $conn = db_connect();
    $sql = "SELECT pr.*, count(*) as n_aziende from prodotto as pr inner join rifornimento as r on pr.idProdotto=r.idProdotto
    inner join fornitriceproduttrice as f on r.idFornProd=f.idFornProd
    group by pr.idProdotto
    having count(*) >= 2";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $conn->close();
    return $rows;
}
?>