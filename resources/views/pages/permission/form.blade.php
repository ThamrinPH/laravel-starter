<x-app-layout>
    <x-slot name="titlePage">
        Permission
    </x-slot>

    <x-slot name="titleHeader">
        Permission - {{ ucwords($type) }}
    </x-slot>

    <div class="d-flex justify-content-center">
        <div class="card card-primary col-6">
            <div class="card-header">
                <h3 class="card-title">{{ ucwords($type) }} Permission Form</h3>
            </div>
    
            <div class="card-body">
                <x-form :action="$action" :type="$type">
                    <div class="row">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <x-text-input name="name" placeholder="Enter name here..." :value="$obj->name ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="guard_name">Guard Name</label>
                            <x-text-input name="guard_name" placeholder="Enter guard name here..." :value="$obj->guard_name ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('guard_name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <a class="col-3" href="{{route('permission.index')}}">
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