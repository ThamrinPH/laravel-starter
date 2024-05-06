<x-app-layout>
    <x-slot name="titlePage">
        Branch
    </x-slot>

    <x-slot name="titleHeader">
        Branchs - {{ ucwords($type) }}
    </x-slot>

    <div class="d-flex justify-content-center">
        <div class="card card-primary col-6">
            <div class="card-header">
                <h3 class="card-title">>{{ ucwords($type) }} Branch Form</h3>
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
                            <x-select2 name="branch_id" :valueId="$obj->parent->id ?? ''" :valueText="$obj->parent->name ?? ''" route="{{ route('branch.select2') }}" placeholder="Select a branch..."></x-select2>
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
</x-app-layout>