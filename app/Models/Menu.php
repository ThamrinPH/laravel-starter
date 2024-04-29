<?php

namespace App\Models;

use App\Enum\Status;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Menu extends MainModel
{
    public $fillable = [
        'menu_id',

        'name',
        'route',
        'routeBase',
        'path',
        'pathBase',
        'icon',
        'role',
        'permission',

        'status'
    ];

    public $validations = [
        'menu_id' => ['bail', 'nullable', 'exists:menus,id'],
        'name' => ['bail', 'required', 'string'],
        'route' => ['bail', 'nullable', 'string'],
        'routeBase' => ['bail', 'nullable', 'string'],
        'path' => ['bail', 'nullable', 'string'],
        'pathBase' => ['bail', 'nullable', 'string'],
        'icon' => ['bail', 'nullable', 'string'],
        'role' => ['bail', 'nullable', 'string'],
        'permission' => ['bail', 'nullable', 'string'],
        'status' => ['bail', 'nullable', 'numeric'],
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    public function setDefaultValues($request = []): Array
    {
        if( empty($request['status']) ) $request['status'] = 1;

        return $request;
    }

    /**
     * Get the user's orders.
     */
    public function childs(): HasMany
    {
        return $this->hasMany(Menu::class, 'menu_id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
