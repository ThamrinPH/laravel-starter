<?php

namespace App\Http\Controllers;

class UserController extends MainController
{
    public $model = 'App\Models\User';
    public $objName = 'User';
    public $view = 'pages';
    public $routeName = 'pages';
    public $datatableName = 'App\DataTables\UsersDataTable';

}
