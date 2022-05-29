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

function model_deliveries_all()
{
    $conn = db_connect();
    $sql = "SELECT co.idConsegna, co.data, co.indirizzo, co.cap, co.citta, concat(cl.nome,' ',cl.cognome) as nCompleto, t.nome as azienda , z.provincia FROM cliente as cl inner join consegna as co on cl.idCliente=co.idCliente
    inner join trasporto as t on co.idTrasporto=t.idTrasporto
    inner join zona as z on co.idZona=z.idZona
    order by co.data desc";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $conn->close();
    return $rows;
}

function model_deliveries_zone() {
  $conn = db_connect();
    $sql = "SELECT * from zona";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $conn->close();
    return $rows;
}

function model_deliveries_detail($idConsegna)
{
    $id = intval($idConsegna);
    $conn = db_connect();
    $sql = "SELECT p.*, p.prezzoV*s.quantita as costoTot, s.quantita FROM consegna as c INNER JOIN spaccio as s on c.idConsegna=s.idConsegna
    INNER JOIN prodotto as p on s.idProdotto=p.idProdotto
    WHERE c.idConsegna=$id";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $conn->close();
    return $rows;
}

function model_deliveries_companies_noproducts(){
  $conn = db_connect();
    $sql = "SELECT fp.* from fornitriceproduttrice as fp
    where fp.idFornProd not in (SELECT fp.idFornProd from fornitriceproduttrice as fp inner join rifornimento as r on fp.idFornProd=r.idFornProd
    inner join prodotto as pr on r.idProdotto=pr.idProdotto
    inner join spaccio as s on pr.idProdotto=s.idProdotto
    group by fp.idFornProd) and fp.idFornProd in (SELECT idFornProd from rifornimento)";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $conn->close();
    return $rows;
}

?>