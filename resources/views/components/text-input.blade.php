@props(['disabled' => false, 'type' => 'text', 'class' => '', 'id' => '', 'name' => '', 'placeholder' => 'Your input here', 'value'])

<input 
type="{{ $type }}" 
class="form-control {{ $class }}" 
id="{{ $name ?? $id }}" 
name="{{ $name }}" 
placeholder="{{ $placeholder }}"
{{ $disabled ? 'disabled' : '' }}
value="{{ $value ?? null }}"
>