<x-app-layout>
    <x-slot name="titlePage">
        Branch
    </x-slot>

    <x-slot name="titleHeader">
        Branchs - Create
    </x-slot>

    <div class="d-flex justify-content-center">
        <div class="card card-primary col-6">
            <div class="card-header">
                <h3 class="card-title">Branch Form</h3>
            </div>
    
            <div class="card-body">
                <x-form :action="$action" :type="$type">
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="name">Name</label>
                            <x-text-input name="name" placeholder="Enter name here..." :value="$obj->name ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="col-12 form-group">
                            <label for="description">Description</label>
                            <x-textarea name="description" placeholder="Enter description here..." :value="$obj->description ?? ''" :disabled="$type == 'show'"></x-textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="col-12 form-group">
                            <label for="branch_id">Parent</label>
                            <select id="select-branch" class="col-12" name="branch_id"></select>
                            <x-input-error :messages="$errors->get('branch_id')" class="mt-2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <a class="col-3" href="{{route('branch.index')}}">
                                <x-danger-button type="button" class="col">{{ $type === 'show' ? 'Back' : 'Cancel'}}</x-danger-button>
                            </a>    
                            <x-primary-button class="{{ $type == 'show' ? 'hidden' : 'col-3' }}">{{ 'Save' }}</x-primary-button>
                        </div>
                    </div>
                </x-forms>
            </div>
        </div>
    </div>

    @push('footer-js')
    <script>
        var select2Dom = $('#select-branch');
        var select2Route = "{{ route('branch.select2') }}";
        select2Dom.select2({
            theme: 'bootstrap',
            ajax: {
                url: select2Route,
                data: function (params) {
                var query = {
                    search: params.term,
                    type: 'public'
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
                }
            }
        });
    </script>

    @if( !empty($obj->parent) )
        <script>
            var select2id = '{{ $obj->parent->id }}'
            var select2text = '{{ $obj->parent->name }}'
            var newOption = new Option(select2text, select2id, true, true);
            select2Dom.append(newOption).trigger('change');
        </script>
    @endif
    @endpush
</x-app-layout>