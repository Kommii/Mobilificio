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
