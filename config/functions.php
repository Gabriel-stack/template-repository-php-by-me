<?php

function dd(mixed ...$var)
{
    echo '<pre style="background-color: black; color: white">';
    var_dump($var);
    echo '</pre>';
    die;
}

function parse_array_to_string(array $var): string
{
    $string = '';
    foreach($var as $key => $value) {
        $string .= $key . ' = ' . $value . ',';
    }
    return rtrim($string, ',');
}