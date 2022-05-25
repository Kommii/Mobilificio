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

?>