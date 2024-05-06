<?php

namespace App\Models;

class Category extends MainModel
{
    public $fillable = [
        'name',
        'of',
        'description',
        'status'
    ];

    public $validations = [];
}
