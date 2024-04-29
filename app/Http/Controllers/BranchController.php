<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchController extends MainController
{
    public $model = 'App\Models\Branch';
    public $objName = 'Branch';
    public $routeName = 'branch';
    public $view = 'pages.branch';
    public $datatableName = 'App\DataTables\BranchDataTable';

    public function select2(Request $request){
        $branches = $this->model::select('id', 'name as text')->get();

        $results = [
            'results' => $branches,
            'pagination' => 'more'
        ];

        return response()->json($results);
    }
}
