<?php

namespace App\Models;

class Type extends MainModel
{
    public $fillable = [
        'name',
        'of',
        'description',
        'status'
    ];

    public $validations = [];
}
