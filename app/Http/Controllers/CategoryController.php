<?php

namespace App\Http\Controllers;

class CategoryController extends MainController
{
    public $model = 'App\Models\Category';
    public $objName = 'Category';
    public $routeName = 'category';
    public $view = 'pages.category';
    public $datatableName = 'App\DataTables\CategoryDataTable';
}
