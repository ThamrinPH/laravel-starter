<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends MainController
{
    public $model = 'App\Models\Menu';
    public $objName = 'Menu';
    public $routeName = 'menu';
    public $view = 'pages.menu';
    public $datatableName = 'App\DataTables\MenuDataTable';

    public function select2(Request $request){
        $menus = $this->model::select('id', 'name as text')->get();

        $results = [
            'results' => $menus,
            'pagination' => 'more'
        ];

        return response()->json($results);
    }
}
