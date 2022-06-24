<?php
require_once __DIR__ . '/models/Model.php';
require_once __DIR__ . '/models/User.php';

$model = new User();
$model = $model->select('*')->where('id', '=', 1);
var_dump($model);