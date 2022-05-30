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


function model_presenzapr_delete($id)
{
  $conn = db_connect();
  $idProd = intval($id);
  $sql = "DELETE FROM presenzapr WHERE idProdotto='$idProd'";
  $result = $conn -> query($sql);
    if(!$result)
    {
        echo $conn->error;
        exit();
    }
    $conn->close();
}

function model_products_delete($id)
{
  $conn = db_connect();
  $idProd = intval($id);
  model_presenzapr_delete($idProd);
  $sql = "DELETE FROM prodotto WHERE idProdotto='$idProd'";
  $result = $conn -> query($sql);
    if(!$result)
    {
        echo $conn->error;
        exit();
    }
    $conn->close();
}

function model_products_update($id, $n, $d, $lu, $la, $a, $i, $p)
{
  $conn = db_connect();
  $nome = $conn -> real_escape_string($n);
  $descrizione = $conn -> real_escape_string($d);
  $lunghezza = $conn -> real_escape_string($lu);
  $larghezza = $conn -> real_escape_string($la);
  $altezza = $conn -> real_escape_string($a);
  $immagine = $conn -> real_escape_string($i);
  $prezzoV = $conn -> real_escape_string($p);
  $idProd = intval($id);
  $sql = "UPDATE prodotto SET nome = '$nome' , descrizione = '$descrizione' , lunghezza = $lunghezza , larghezza = $larghezza , altezza = $altezza , immagine = '$immagine' , prezzoV = $prezzoV WHERE idProdotto = $idProd";
  $result = $conn -> query($sql);
    if(!$result)
    {
        echo $conn->error;
        exit();
    }
    $conn->close();
}

function get_all_aziende(){
  $conn = db_connect();
  $sql = "SELECT * FROM fornitriceproduttrice";
  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $conn->close();
  return $rows;
}

function get_all_categorie(){
  $conn = db_connect();
  $sql = "SELECT * FROM categoria";
  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $conn->close();
  return $rows;
}

function model_products_add($t, $n, $d, $lu, $la, $a, $i, $pv, $pa, $f, $m, $c){
  $conn = db_connect();
  $tipo = $conn->real_escape_string($t);
  $nome = $conn->real_escape_string($n);
  $descrizione = $conn->real_escape_string($d);
  $lunghezza = intval($lu);
  $larghezza = intval($la);
  $altezza = intval($a);
  $immagine = $conn->real_escape_string($i)
  $prezzoV = $conn->real_escape_string($pv);
  $prezzoA = $conn->real_escape_string($pa);
  $forma = $conn->real_escape_string($f);
  $materiale = $conn->real_escape_string($m);
  $categoria = intval($c);
  if($materiale == "" || $forma == ""){
    $sql = "INSERT INTO `prodotto` (`idProdotto`, `tipo`, `nome`, `descrizione`, `lunghezza`, `larghezza`, `altezza`, `forma`, `materiale`, `immagine`, `prezzoA`, `prezzoV`, `idCategoria`) VALUES (NULL, '$tipo', '$nome', '$descrizione', '$lunghezza', '$larghezza', '$altezza', NULL, NULL, '$immagine', '$prezzoA', '$prezzoV', '$categoria')";
  }
  else{
  $sql = "INSERT INTO `prodotto` (`idProdotto`, `tipo`, `nome`, `descrizione`, `lunghezza`, `larghezza`, `altezza`, `forma`, `materiale`, `immagine`, `prezzoA`, `prezzoV`, `idCategoria`) VALUES (NULL, '$tipo', '$nome', '$descrizione', '$lunghezza', '$larghezza', '$altezza', '$forma', '$materiale', '$immagine', '$prezzoA', '$prezzoV', '$categoria')";
  }
  $result = $conn -> query($sql);
    if(!$result)
    {
        echo $conn->error;
        exit();
    }
    $conn->close();
}

function model_products_sales()
{
    $conn = db_connect();
    $sql = "SELECT pr.*, c.prezzoS from prodotto as pr inner join costituzione as c on pr.idProdotto=c.idProdotto inner join promozione as pro on c.idPromozione=pro.idPromozione where NOW() >= pro.dataI and NOW() <= pro.dataF";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    $conn->close();
    return $rows;
}

function model_products_search($nome)
{
  $conn = db_connect();
  $prodotto = $conn -> real_escape_string($nome);
  $sql = "SELECT * FROM prodotto
  WHERE nome like '%$prodotto%'
  ORDER BY idCategoria";
  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $conn->close();
  return $rows;
}

function model_products_semilavorati_materiale($materiale){
  $conn = db_connect();
  $mat = $conn -> real_escape_string($materiale);
  $sql = "SELECT * FROM prodotto
  WHERE materiale = '$mat'
  ORDER BY prezzoV";
  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $conn->close();
  return $rows;
}
?>