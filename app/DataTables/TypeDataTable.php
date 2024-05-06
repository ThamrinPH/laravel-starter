<?php

namespace App\DataTables;

use App\Models\Type;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TypeDataTable extends DataTable
{
    public $routeName = 'type.';

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($row){
            $edit = '<a href="'.route($this->routeName.'edit', ['type' => $row->id]).'" class="btn btn-warning" data-toggle="tooltip" title="Edit" ><i class="fa-solid fa-pen"></i></a>';
            $show = '<a href="'.route($this->routeName.'show', ['type' => $row->id]).'" class="btn btn-info" data-toggle="tooltip" title="Inspect" ><i class="fa-solid fa-magnifying-glass"></i></a>';

            $delete = '<a href="" data-name="' . $row->name .'" data-remote="' . route($this->routeName.'destroy', $row->id) . '"
            class="btn btn-danger btn-delete" data-toggle="tooltip" title="Delete">
            <i class="fa fa-trash"></i>
            </a>';

            return '<div class="btn-group">'.$edit.$show.$delete.'</div>';
        })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Type $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('type-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('<"row"<"col-6"B><"col-6 d-flex flex-row-reverse"fr>>t<"row"<"col-6"i><"col-6 d-flex flex-row-reverse"p>>')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('add'),
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('name'),
            Column::make('of'),
            Column::make('description'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Type_' . date('YmdHis');
    }
}
