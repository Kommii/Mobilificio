<?php
require '../app/models/deliveries.php';

function controller_deliveries_all()
{
    global $data;
    $data['rows'] = model_deliveries_all();
    view_render_html();
}

?>