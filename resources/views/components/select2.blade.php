@props(['id', 'name', 'value', 'class', 'route', 'placeholder'])
<div>
    <select id="select-{{ $id ?? $name }}" class="col-12 {{ $class ?? ''}}" name="{{ $name }}"></select>
    <label {{ $attributes->merge(['id' => 'error-'.$name, 'class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}/>
</div>

@push('footer-js')
    <script>
        var select2Dom = $('#select-{{$id ?? $name}}');
        var select2Route = "{{ $route }}";
        select2Dom.select2({
            theme: 'bootstrap',
            placeholder: "{{ $placeholder ?? 'Select' }}",
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

    @if( !empty($valueId) )
        <script>
            var select2id = '{{ $valueId }}';
            var select2text = '{{ $valueText }}';
            var newOption = new Option(select2text, select2id, true, true);
            select2Dom.append(newOption).trigger('change');
        </script>
    @endif
    @endpush