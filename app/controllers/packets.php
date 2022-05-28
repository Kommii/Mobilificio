<?php
require '../app/models/packets.php';

function controller_packets_all()
{
    global $data;
    $data['rows'] = model_packets_all();
    view_render_html();
}
?>