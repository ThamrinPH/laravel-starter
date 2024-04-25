<?php

namespace App\Http\Controllers;

class MenuController extends MainController
{
    public $model = 'App\Models\Menu';
    public $objName = 'Menu';
    public $routeName = 'menu';
    public $view = 'pages.menu';
    public $datatableName = 'App\DataTables\MenusDataTable';
}
