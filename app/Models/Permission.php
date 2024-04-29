<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory, HasUuids;

    public $fillable = [];
    public $validations = [];

    public function getValidations()
    {
        return $this->validations;
    }

    public function setDefaultValues($request = []): Array
    {
        if( empty($request['guard_name'] ) ) $request['guard_name'] = 'web';
        
        return $request;
    }
}
