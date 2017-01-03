<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nestable\NestableTrait;

class Category extends  \Eloquent 
{
    use NestableTrait;

    protected $parent = 'parent_id';
}
