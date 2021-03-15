<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

    include 'model.php';

    $model = new Model();

    $insert = $model->insert();

?>