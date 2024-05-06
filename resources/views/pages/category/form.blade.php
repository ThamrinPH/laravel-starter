<x-app-layout>
    <x-slot name="titlePage">
        Category
    </x-slot>

    <x-slot name="titleHeader">
        Category - {{ ucwords($type) }}
    </x-slot>

    <div class="d-flex justify-content-center">
        <div class="col card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ ucwords($type) }} Category Form</h3>
            </div>

            <div class="card-body">
                <x-form :action="$action" :type="$type">
                    <div class="row">
                        <div class="col form-group">
                            <label for="name">Name</label>
                            <x-text-input name="name" placeholder="Stella" :value="$obj->name ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="col form-group">
                            <label for="of">Of</label>
                            <x-text-input name="of" placeholder="house" :value="$obj->of ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('of')" class="mt-2" />
                        </div>                        
                        <div class="col-12 form-group">
                            <label for="description">Description</label>
                            <x-textarea name="description" placeholder="Enter category description here..." :value="$obj->description ?? ''" :disabled="$type == 'show'"></x-textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <a class="col-3" href="{{route('category.index')}}">
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