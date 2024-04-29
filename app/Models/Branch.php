<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends MainModel
{
    public $fillable = [
        'name',
        'description',
        'branch_id'
    ];

    public $validations = [
        'name' => ['bail', 'required', 'string'],
        'description' => ['bail', 'nullable', 'string'],
        'branch_id' => ['bail', 'nullable', 'exists:branches,id'],
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
