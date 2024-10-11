@php
    $success = Session::get('success');
    $error = Session::get('error');
    $errors = Session::get('errors');
@endphp

@if (!empty($success))
    <script>
        $(document).ready(function() {
            toastr.success("{{$success}}", "{{__('strings.success')}}");
        });
    </script>
@endif

@if (!empty($error))
    <script>
        $(document).ready(function() {
            toastr.error("{{$error}}", "{{__('strings.error')}}");
        });
    </script>
@endif

@if (!empty($errors))
    @foreach ($errors->all() as $error)
        <script>
            $(document).ready(function() {
                toastr.error("{{$error}}", "{{__('strings.error')}}");
            });
        </script>
    @endforeach
@endif

