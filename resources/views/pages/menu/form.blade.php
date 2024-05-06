<x-app-layout>
    <x-slot name="titlePage">
        Menu
    </x-slot>

    <x-slot name="titleHeader">
        Menu - {{ ucwords($type) }}
    </x-slot>

    <div class="d-flex justify-content-center">
        <div class="col card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ ucwords($type) }} Menu Form</h3>
            </div>

            <div class="card-body">
                <x-form :action="$action" :type="$type">
                    <div class="row">
                        <div class="col form-group">
                            <label for="name">Name</label>
                            <x-text-input name="name" placeholder="Enter menu name here..." :value="$obj->name ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="col form-group">
                            <label for="menu_id">Parent</label>
                            <select id="select-menu" class="col-12" name="menu_id"></select>
                            <x-input-error :messages="$errors->get('menu_id')" class="mt-2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="route">Route</label>
                            <x-text-input name="route" placeholder="(route.name.index)" :value="$obj->route ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('route')" class="mt-2" />
                        </div>
                        <div class="col form-group">
                            <label for="routeBase">Route Base</label>
                            <x-text-input name="routeBase" placeholder="(route.*)" :value="$obj->routeBase ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('routeBase')" class="mt-2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="path">Path</label>
                            <x-text-input name="path" placeholder="(route/path/...)" :value="$obj->path ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('path')" class="mt-2" />
                        </div>
                        <div class="col form-group">
                            <label for="pathBase">Path Base</label>
                            <x-text-input name="pathBase" placeholder="(route/base/*)" :value="$obj->pathBase ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('pathBase')" class="mt-2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="icon">Icon</label>
                            <x-text-input name="icon" placeholder="(fa-solid fa-something)" :value="$obj->icon ?? ''" :disabled="$type == 'show'" :append="true"></x-text-input>
                            <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                        </div>
                        <div class="col form-group">
                            <label for="role">Role</label>
                            <x-text-input name="role" placeholder="(I'm The Boss!)" :value="$obj->role ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>
                        <div class="col form-group">
                            <label for="permission">Permission</label>
                            <x-text-input name="permission" placeholder="(object-do something)" :value="$obj->permission ?? ''" :disabled="$type == 'show'"></x-text-input>
                            <x-input-error :messages="$errors->get('permission')" class="mt-2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <a class="col-3" href="{{route('menu.index')}}">
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
        $('#icon').on('change', function(e) {
            $('#icon-icon').removeClass();
            $('#icon-icon').addClass($('#icon').val());
        });

        var select2Dom = $('#select-menu');
        var select2Route = "{{ route('menu.select2') }}";
        select2Dom.select2({
            theme: 'bootstrap',
            placeholder: 'Select a parent menu',
            ajax: {
                url: select2Route,
                data: function(params) {
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