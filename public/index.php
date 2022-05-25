<?php

require_once '../app/config.php';
$route = $_GET['route'];
if(!$route) $route="home/index";
$parts = explode('/', $route);

$controller = $parts[0];
$action = $parts[1];
$params = array_slice($parts, 2);

function render_body(){
    global $controller, $action; // rendo globali le variabili così posso leggerle nel metodo
    include '../app/views/' . $controller . '/' . $action . '.php';
}

$data = array();
$data['base_path'] = "/mobilificio";
$data['page_title'] = "Mobilificio minatori";
$data['page_name'] = $action;

$include_file = "../app/controllers/$controller.php";
if(file_exists($include_file))
    require $include_file;

$controller_function = "controller_" . $controller . "_" . $action;

if ((int)function_exists($controller_function)) {
    call_user_func_array($controller_function, $params);
} 
else {
    view_render_html("404");
}

function view_render_html($view = '')
{
    global $view_file, $controller, $action;
    if($view) $view_name = $view;
    else $view_name = $controller . '/' . $action;
    $view_file = '../app/views/' . $view_name . '.php';
    $template_file = '../app/views/template.php';
    require $template_file;
}