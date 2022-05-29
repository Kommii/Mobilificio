<?php
require '../app/models/packets.php';

function controller_packets_all()
{
    global $data;
    $data['rows'] = model_packets_all();
    view_render_html();
}

function controller_packets_detail($id)
{
    global $data;
    $data['id'] = $id;
    $data['products'] = model_packets_allproducts($id);
    view_render_html();
}

function controller_packets_removepa($id)
{
    model_presenzapa_delete($id);
    view_render_html();
}
?>