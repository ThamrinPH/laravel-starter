@props(['name', 'id', 'cols', 'rows', 'class', 'value', 'placeholder', 'value', 'disabled'])

<textarea name="{{ $name }}" id="{{ $name ?? $id }}" cols="{{ $cols ?? 30 }}" rows="{{ $rows ?? 10 }}" class="form-control" placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}>{{ $value ?? $slot }}</textarea>