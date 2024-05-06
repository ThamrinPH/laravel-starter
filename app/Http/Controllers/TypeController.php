<?php

namespace App\Http\Controllers;

class TypeController extends MainController
{
    public $model = 'App\Models\Type';
    public $objName = 'Type';
    public $routeName = 'type';
    public $view = 'pages.type';
    public $datatableName = 'App\DataTables\TypeDataTable';
}
