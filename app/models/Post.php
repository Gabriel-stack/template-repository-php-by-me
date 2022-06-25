<?php

namespace app\models;

class Post extends Model
{
    public function __construct()
    {
        parent::__construct('posts');
    }
}