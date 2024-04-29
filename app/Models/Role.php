<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Role extends SpatieRole
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
