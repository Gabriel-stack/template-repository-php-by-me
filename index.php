<?php
require_once __DIR__ . '/vendor/autoload.php';

use app\models\User;
use app\models\Post;

$user = new User();
$post = new Post();

$user = ['name'=> 'John Doe', 'email'=> 'john@eemail.com', 'password'=> password_hash('12345678', PASSWORD_DEFAULT)];
attempt($user);
$loggedUser = get('user');
// $password = password_hash('12345678', PASSWORD_DEFAULT);
dd($loggedUser);