@props(['name', 'id', 'cols', 'rows', 'class', 'value', 'placeholder', 'value', 'disabled'])

<textarea name="{{ $name }}" id="{{ $name ?? $id }}" cols="{{ $cols ?? 30 }}" rows="{{ $rows ?? 10 }}" class="form-control" placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}>{{ $value ?? $slot }}</textarea>

<label {{ $attributes->merge(['id' => 'error-'.$name, 'class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}/>