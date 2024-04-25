<?php

namespace App\Models;

class Menu extends MainModel
{
    public $fillable = [
        'menu_id',

        'name',
        'route',
        'path',
        'icon',
        'role',
        'permission',

        'status'
    ];

    public $validations = [
        'menu_id' => ['bail', 'nullable', 'exists:menus,id'],
        'name' => ['bail', 'required', 'string'],
        'route' => ['bail', 'nullable', 'string'],
        'path' => ['bail', 'nullable', 'string'],
        'icon' => ['bail', 'nullable', 'string'],
        'role' => ['bail', 'nullable', 'string'],
        'permission' => ['bail', 'nullable', 'string'],
        'status' => ['bail', 'nullable', 'string'],
    ];
}
