<?php
session_start();
require '../app/models/home.php';
function controller_home_index()
{
    global $data;
    view_render_html();
}

function controller_home_about()
{
    view_render_html();
}

function controller_home_login()
{
    view_render_html();
}

function controller_home_loginact()
{
    global $data;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $data['result'] = model_get_user($username);
    $cliente=$data['result'];
    $data['pass']=$password;
    view_render_html();
}

function controller_home_logout()
{
    view_render_html();
}

function controller_home_cart()
{
    global $data;
    if(isset($_SESSION['username']))
    {
        $data['prodotti']=model_get_carrello_prodotti($_SESSION['username']);
        $data['pacchetti']=model_get_carrello_pacchetti($_SESSION['username']);
    }
    view_render_html();
}

function controller_home_addcart()
{
    global $data;
    if(isset($_SESSION['username']))
    {
        $idProdotto=$_POST['idProdotto'];
        $quantita=$_POST['quantita'];
        model_insert_to_cart($idProdotto, $quantita, $_SESSION['username']);
    }
    view_render_html();
}

function controller_home_addcartp()
{
    global $data;
    if(isset($_SESSION['username']))
    {
        $idPacchetto=$_POST['idPacchetto'];
        $quantita=$_POST['quantita'];
        model_insert_to_cartp($idPacchetto, $quantita, $_SESSION['username']);
    }
    view_render_html();
}


