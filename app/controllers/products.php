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

function controller_products_addact()
{
    global $data;
    $tipo=$_POST['Tipo'];
    $nome=$_POST['Nome'];
    $desc=$_POST['Descrizione'];
    $forma="";
    $materiale="";
    if(isset($_POST['Forma'])){
    $forma=$_POST['Forma'];
    }
    if(isset($_POST['Materiale'])){
        $materiale=$_POST['Materiale'];
    }
    $lun=intval($_POST['Lunghezza']);
    $lar=intval($_POST['Larghezza']);
    $alt=intval($_POST['Altezza']);
    $imm=$_POST['Immagine'];
    $prezzoA=intval($_POST['PrezzoA']);
    $prezzoV=intval($_POST['PrezzoV']);
    $idCategoria=intval($_POST['Categoria']);
    $idFornProd=intval($_POST['Azienda']);
    model_products_add($tipo,$nome, $desc,$lun, $lar, $alt, $imm, $prezzoV, $prezzoA, $forma, $materiale, $idCategoria, $idFornProd);
    view_render_html();
}

function controller_products_add()
{
    global $data;
    $data['aziende'] = get_all_aziende();
    $data['categorie'] = get_all_categorie();
    view_render_html();
}

function controller_products_removepr($id)
{
    model_presenzapr_delete($id);
    view_render_html();
}