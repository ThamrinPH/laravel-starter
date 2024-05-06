@props(['action', 'class', 'type' => '', 'id'])

<form {{ $attributes->merge([
    'class' => '',
    'id' => $id ?? 'my-form'
    ]) }}
    >
    @csrf
    
    @if($type == 'edit')
        @method('PUT')
    @endif

    {{ $slot }}
</form>

@push('footer-js')
<script>
    const url = "{{ $action }}";
    const method = "{{ $type }}";
    const formSelector = $('#{{ $id ?? "my-form"}}');
    
    formSelector.on('submit', function(e) {
        e.preventDefault();
        Swal.showLoading();
        var iRequests = formSelector.serializeArray();
        
        if(method == 'edit'){
            console.log(iRequests);

            axios.put(url, iRequests, {
                headers: {
                    'accept': "*/*",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                    }
                })
                .then((response) => {
                    Swal.close();

                    handleResponse(response);                    
                }).catch((errors) => {
                    Swal.close();
                    handleErrors(errors);
                });
        }else{
            console.log(iRequests);

            axios.post(url, iRequests, {
                headers: {
                    'accept': "*/*",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                    }
                })
                .then((response) => {
                    Swal.close();

                    handleResponse(response);
                }).catch((errors) => {
                    Swal.close();
                    handleErrors(errors);
                });
        }        
    });

    function handleResponse(response){
        if(response.data.statusCode == 200) {
            Swal.fire({
                icon: "success",
                title: response.data.success,
                showConfirmButton: false,
                timer: 1500
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    if(response.data.redirectTo) window.location.replace(response.data.redirectTo);
                }
            });
        }

        if(response.data.statusCode == 500) {
            var errors = response.data.errors;

            for (const [key, value] of Object.entries(errors)) {
                $('#error-'+key).text(value);
            }

            Swal.fire({
                icon: "error",
                title: "Error",
                showConfirmButton: false,
                timer: 1500
            })
        }

        return;
    }

    function handleErrors(errors){
        console.log(errors, errors.length);

        if(errors.length > 0) {
            errors.map((row) => {
                console.log(row);
            });
        }
    }

</script>
@endpush