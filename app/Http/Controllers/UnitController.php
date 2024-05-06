<?php

namespace App\Http\Controllers;

class UnitController extends MainController
{
    public $model = 'App\Models\Unit';
    public $objName = 'Unit';
    public $routeName = 'unit';
    public $view = 'pages.unit';
    public $datatableName = 'App\DataTables\UnitDataTable';
}
