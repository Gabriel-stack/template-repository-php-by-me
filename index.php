<?php
require_once __DIR__ . '/models/Model.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/config/functions.php';

$model = new User();
$model = $model->where('id', '=', 1)->update();
$var = ['name' => 'John', 'age' => '30'];
$var2 = $model->select(['id'])->where('id','>', 1);

dd( $var2,parse_array_to_string($var));