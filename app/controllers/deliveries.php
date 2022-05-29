<?php
require '../app/models/deliveries.php';

function controller_deliveries_all()
{
    global $data;
    $data['rows'] = model_deliveries_all();
    view_render_html();
}

function controller_deliveries_detail($id)
{
    global $data;
    $idConsegna = intval($id);
    $data['rows'] = model_deliveries_detail($idConsegna);
    view_render_html();
}


?>