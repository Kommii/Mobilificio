<?php
session_start();
require '../app/models/home.php';
function controller_home_index()
{
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
    }
    view_render_html();
}

?>