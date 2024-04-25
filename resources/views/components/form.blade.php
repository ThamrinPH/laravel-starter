@props(['action', 'class', 'type' => ''])

<form {{ $attributes->merge([
    'action' => $action,
    'method' => 'POST',
    'class' => ''
    ]) }}
    >
    @csrf
    
    @if($type == 'edit')
        @method('PATCH')
    @endif

    {{ $slot }}
</form>