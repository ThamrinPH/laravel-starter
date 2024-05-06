<x-app-layout>
    <x-slot name="titlePage">
        Datatable
    </x-slot>

    <x-slot name="titleHeader">
        Datatable - Symbols
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Symbols</h3>
        </div>

        <div class="card-body">
                {{ $dataTable->table() }}
        </div>
    </div>

    @push('head-js')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush

    @push('footer-js')
    <script>
        let dataTable = $('#branchs-table');

        dataTable.on('click', '.btn-delete', function (e) {
                e.preventDefault();
                let url = $(this).data('remote');
                let name = $(this).data("name");
                
                Swal.fire({
                    title:'Are you sure want to delete: ' + name + '?',
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    reverseButtons: true
                }).then(function (value) {
                    if (value.value) {
                        axios.delete(url,{
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            })
                            .then((response) => {
                                Swal.fire({
                                    icon: "success",
                                    title: response.data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                dataTable.DataTable().draw(false);
                            });
                    }
                })
            });
    </script>
    @endpush
</x-app-layout>