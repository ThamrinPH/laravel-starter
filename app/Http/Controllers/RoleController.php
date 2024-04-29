<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends MainController
{
    public $model = 'App\Models\Role';
    public $objName = 'Role';
    public $routeName = 'role';
    public $view = 'pages.role';
    public $datatableName = 'App\DataTables\RoleDataTable';
}
