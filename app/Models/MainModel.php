<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainModel extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    public $fillable = [];
    public $validations = [];

    public function getValidations()
    {
        return $this->validations ?? [];
    }

    public function getFillables()
    {
        return $this->fillable ?? [];
    }

    public function setDefaultValues($request = []): Array
    {
        return $request;
    }
}
