<?php

namespace App\Models;

class Unit extends MainModel
{
    public $fillable = [
        'name',
        'of',
        'symbol',
        'description',
        'status'
    ];

    public $validations = [
        'name' => ['bail', 'string', 'required'],
        'of' => ['bail', 'string', 'required'],
        'symbol' => ['bail', 'string', 'required'],
        'description' => ['bail', 'string', 'optional'],
    ];
}
