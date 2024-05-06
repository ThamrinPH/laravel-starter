<x-app-layout>
    <x-slot name="titlePage">
        Datatable
    </x-slot>

    <x-slot name="titleHeader">
        Datatable - Users
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>

        <div class="card-body">
                {{ $dataTable->table() }}
        </div>
    </div>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</x-app-layout>