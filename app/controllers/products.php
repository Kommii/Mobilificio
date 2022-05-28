<?php
require '../app/models/products.php';

function controller_products_all()
{
    global $data;
    $data['rows'] = model_products_all();
    view_render_html();
}

function controller_products_detail($id)
{
    global $data;
    $data['row'] = model_products_detail($id);
    view_render_html();
}

function controller_products_delete($id){
    model_products_delete($id);
    view_render_html();
}

function controller_products_update($id){
    global $data;
    $data['row'] = model_products_detail($id);
    view_render_html();
}

function controller_products_updateact()
{
    global $data;
    $id=$_POST['idProdotto'];
    $nome=$_POST['Nome'];
    $desc=$_POST['Descrizione'];
    $lun=intval($_POST['Lunghezza']);
    $lar=intval($_POST['Larghezza']);
    $alt=intval($_POST['Altezza']);
    $imm=$_POST['Immagine'];
    $prezzo=intval($_POST['PrezzoV']);
    model_products_update($id, $nome, $desc,$lun,$lar,$alt,$imm,$prezzo);
    view_render_html();
}