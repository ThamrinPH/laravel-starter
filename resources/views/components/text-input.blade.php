@props(['disabled' => false, 'type' => 'text', 'class' => '', 'id' => '', 'name' => '', 'placeholder' => 'Your input here', 'value', 'prepend' => false, 'append' => false, 'iconClass'])

<div class="input-group">
    @if($prepend)
    <div class="input-group-prepend">
        <span class="input-group-text"><i id="icon-{{ $name ?? '' }}" class="{{ $iconClass ?? 'fas fa-check' }}"></i></span>
    </div>
    @endif
    <input type="{{ $type }}" class="form-control {{ $class }}" id="{{ $name ?? $id }}" name="{{ $name }}" placeholder="{{ $placeholder }}"{{ $disabled ? 'disabled' : '' }}value="{{ $value ?? null }}">
    @if($append)
    <div class="input-group-append">
        <span class="input-group-text"><i id="icon-{{ $name ?? '' }}" class="{{ $iconClass ?? 'fas fa-check' }}"></i></span>
    </div>
    @endif
</div>
<label {{ $attributes->merge(['id' => 'error-'.$name, 'class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}/>