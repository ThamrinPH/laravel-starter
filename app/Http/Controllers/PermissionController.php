<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends MainController
{
    public $model = 'App\Models\Permission';
    public $objName = 'Permission';
    public $routeName = 'permission';
    public $view = 'pages.permission';
    public $datatableName = 'App\DataTables\PermissionDataTable';
}
