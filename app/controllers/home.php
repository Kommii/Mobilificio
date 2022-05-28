<?php
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

?>