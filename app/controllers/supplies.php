<?php
require '../app/models/supplies.php';

function controller_supplies_all(){
    global $data;
    $data['rows'] = model_supplies_all();
    view_render_html();
}

?>