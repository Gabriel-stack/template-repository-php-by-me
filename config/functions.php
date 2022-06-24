<?php

function dd(mixed $var)
{
    echo '<pre style="background-color: black; color: white">';
    var_dump($var);
    echo '</pre>';
    die;
}