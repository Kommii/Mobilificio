<?php
require '../app/models/sales.php';

function controller_sales_all() {
    global $data;
    $data['rows']=model_sales_products();
    view_render_html();
}
?>