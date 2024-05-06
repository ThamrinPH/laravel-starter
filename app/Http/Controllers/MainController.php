<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class MainController extends Controller
{
    public $model = '';
    public $objName = '';
    public $view = 'pages';
    public $routeName = 'pages';
    public $datatableName = 'App\DataTables\UserDataTable';
 
    public $res = [
        'messages' => '',
        'code' => '',
        'data' => []
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        if( !empty($this->datatableName) ) {

            /** Returning Json/File Excel */
            $res = $this->datatable();
            

            return $res;
        }

        /** Returning View */
        return view($this->view.'.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view($this->view.'.form', [
            'type' => 'create',
            'action' => route($this->routeName.'.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $obj = new $this->model;
        
        $validations = $obj->getValidations();

        $filteredRequest = $this->prepRequest($request->all());

        $req = $obj->setDefaultValues($filteredRequest);

        $validator = Validator::make($req, $validations);

        if ($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['statusCode' => 500, 'statusMessage' => 'failed', 'errors' => $validator->errors()]);
            }

            return redirect()
                        ->back()
                        ->with('errors', $validator->errors())
                        ->withErrors($validator->errors())
                        ->withInput();
        }
 
        // Retrieve the validated input...
        $validated = $validator->validated();

        $res = $obj::create($validated);
 
        if( !empty($res->id) ) {
            DB::commit();

            if($request->ajax()) 
            {
                return response()->json([
                    'statusCode' => 200, 
                    'statusMessage' => 'Success', 
                    'success' => ucwords($this->objName).' succesfully created', 
                    'redirectTo' => route($this->routeName.'.index'),
                    'data' => $res
                ]);                
            }

            return redirect()
                ->route($this->routeName.'.index')
                ->with(['success', ucwords($this->objName).' succesfully created', 'data'=> $res]);
        }else{
            DB::rollBack();

            if($request->ajax()) {
                return response()->json(['statusCode' => 500, 'statusMessage' => 'failed', 'errors' => $validator->errors()]);
            }

            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $obj = $this->model::where('id', $id)->first();

        return view($this->view.'.form', [
            'type' => 'show',
            'obj' => $obj,
            'action' => ''
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $obj = $this->model::where('id', $id)->first();

        return view($this->view.'.form', [
            'type' => 'edit',
            'obj' => $obj,
            'action' => route($this->routeName.'.update', [$this->routeName => $id])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = $this->model::where('id', $id)->first();

        DB::beginTransaction();
        $obj = new $this->model;
        
        $validations = $obj->getValidations();
        
        $filteredRequest = $this->prepRequest($request->all());

        $req = $obj->setDefaultValues($filteredRequest);

        $validator = Validator::make($req, $validations);

        if ($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['messages', $validator->errors()]);
            }

            return redirect()
                        ->back()
                        ->with('errors', $validator->errors())
                        ->withErrors($validator->errors())
                        ->withInput();
        }
 
        // Retrieve the validated input...
        $validated = $validator->validated();
        
        $res = $this->model::where('id', $id)->update($validated);

        if($res > 0) {
            DB::commit();

            if($request->ajax()) {
                return response()->json(
                    [
                        'statusCode' => 200, 
                        'statusMessage' => 'Success', 
                        'success' => ucwords($this->objName).' succesfully updated', 
                        'redirectTo' => route($this->routeName.'.index'),
                        'data'=> $this->model::where('id', $id)->first()
                    ]);
            }

            return redirect()
                ->route($this->routeName.'.index')
                ->with([
                    'success'=> ucwords($this->objName).' succesfully updated',
                    'data'=> $this->model::where('id', $id)->first()
                ]);
        }else{
            DB::rollBack();

            if($request->ajax()) {
                return response()->json(['statusCode' => 500, 'statusMessage' => 'failed', 'errors' => $validator->errors()]);
            }

            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        $obj = $this->model::where('id', $id)->first();

        if( !empty($obj->id) ) {
            $res = $this->model::where('id', $id)->delete();

            if($res) {
                DB::commit();
    
                return response()->json(['statusCode' => 200,'statusText' => 'success', 'message' => $this->objName.' succesfully deleted']);
            }else{
                DB::rollBack();
    
                return response()->json(['statusCode' => 500,'statusText' => 'failed', 'message' => $this->objName.' failed to delete', 'data' => $res]);
            }
        }


    }

    public function datatable()
    {
        $dataTable = new $this->datatableName;

        return $dataTable->render($this->view.'.index');
    }

    public function prepRequest($request)
    {
        $obj = new $this->model;
        $fillables = $obj->getFillables();

        $inputs = [];

        foreach($request as $requestRow)
        {
            if( in_array($requestRow['name'], $fillables)) $inputs[$requestRow['name']] = $requestRow['value'];
        }

        return $inputs ?? $request;
    }

}
