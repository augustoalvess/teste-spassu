@props(['data' => null])

<div class="row">
    <div class="col-md-3 form-group">
        <x-common.fields.zipcode-field id="zipcode" label="{{__('strings.zipcode')}}" value="{{old('zipcode') ?? $data->zipcode ?? ''}}"></x-common.fields.zipcode-field>
    </div>
    <div class="col-md-3 form-group">
        <x-common.fields.dropdown-field id="country_id" label="{{__('strings.country')}}" :options="$countries" value="{{old('country_id') ?? $data->city->state->country_id ?? ''}}"></x-common.fields.dropdown-field>
    </div>
    <div class="col-md-3 form-group">
        <x-common.fields.dropdown-field id="state_id" label="{{__('strings.state')}}" :options="$states" value="{{old('state_id') ?? $data->city->state_id ?? ''}}"></x-common.fields.dropdown-field>
    </div>
    <div class="col-md-3 form-group">
        <x-common.fields.dropdown-field id="city_id" label="{{__('strings.city')}}" :options="$cities" value="{{old('city_id') ?? $data->city_id ?? ''}}"></x-common.fields.dropdown-field>
    </div>
</div>
<div class="row">
    <div class="col-md-9 form-group">
        <x-common.fields.text-field id="street" label="{{__('strings.street')}}" value="{{old('street') ?? $data->street ?? ''}}"></x-common.fields.text-field>
    </div>
    <div class="col-md-3 form-group">
        <x-common.fields.text-field id="number" label="{{__('strings.number')}}" value="{{old('number') ?? $data->number ?? ''}}"></x-common.fields.text-field>
    </div>
</div>
<div class="row">
    <div class="col-md-3 form-group">
        <x-common.fields.text-field id="neighborhood" label="{{__('strings.neighborhood')}}" value="{{old('neighborhood') ?? $data->neighborhood ?? ''}}"></x-common.fields.text-field>
    </div>
    <div class="col-md-9 form-group">
        <x-common.fields.text-field id="complement" label="{{__('strings.complement')}}" value="{{old('complement') ?? $data->complement ?? ''}}"></x-common.fields.text-field>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#country_id").on( "change", function() {
            $('#obscure-loading').fadeIn("slow");
            $('#state_id,#city_id').find('option').remove().end();
            $('#state_id,#city_id').append($('<option>', { 
                value: "",
                text : "{{__('strings.select')}}"
            }));
            $.ajax({
                url: "/address/states",
                type: "post",
                data: {
                    country_id: $('#country_id').val(),
                    _token: $('[name=_token]').val(),
                },
                success: function(response){
                    for (let state of JSON.parse(response)) {
                        $('#state_id').append($('<option>', { 
                            value: state.value,
                            text : state.description
                        }));
                    }
                    $('#obscure-loading').fadeOut("slow");
                },
                error: function(response) {
                    $('#obscure-loading').fadeOut("slow");
                },
            });        
        });

        $("#state_id").on( "change", function() {
            $('#obscure-loading').fadeIn("slow");
            $('#city_id').find('option').remove().end();
            $('#city_id').append($('<option>', { 
                value: "",
                text : "{{__('strings.select')}}"
            }));
            $.ajax({
                url: "/address/cities",
                type: "post",
                data: {
                    state_id: $('#state_id').val(),
                    _token: $('[name=_token]').val(),
                },
                success: function(response){
                    for (let city of JSON.parse(response)) {
                        $('#city_id').append($('<option>', { 
                            value: city.value,
                            text : city.description
                        }));
                    }
                    $('#obscure-loading').fadeOut("slow");
                },
                error: function(response) {
                    $('#obscure-loading').fadeOut("slow");
                },
            });        
        });
    });
</script>