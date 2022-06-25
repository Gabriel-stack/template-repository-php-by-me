<?php

use app\core\Session;

function get(string $key)
{
    return Session::get($key);
}

function set(string $key, mixed $value)
{
    Session::set($key, $value);
}
