<?php
 
 use app\core\Auth;

function attempt(array $credentials)
{
    $auth = new Auth();
    $auth->attempt($credentials);
}