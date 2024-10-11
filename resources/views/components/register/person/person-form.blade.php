@props(['title', 'route', 'backRoute', 'persontypes', 'contributions', 'data' => null])

<x-common.panels.page title="{{$title}}">
    <form class="form-horizontal" action="{{$route}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 form-group">
                <x-common.fields.text-field id="name" label="{{__('strings.name')}}" required="true" value="{{old('name') ?? $data->name ?? ''}}" required="true"></x-common.fields.text-field>
            </div>
            <div class="col-md-3 form-group">
                <x-common.fields.text-field id="number" label="{{__('strings.internal_code')}}" value="{{old('number') ?? $data->number ?? ''}}"></x-common.fields.text-field>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6  form-group">
                <x-common.fields.text-field id="social_reason" label="{{__('strings.social_reason')}}" value="{{old('social_reason') ?? $data->social_reason ?? ''}}"></x-common.fields.text-field>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 form-group">
                <x-common.fields.select-field id="person_type" label="{{__('strings.person_type')}}" :options="$persontypes" value="{{old('person_type') ?? $data->person_type ?? \App\Domain\Common\Models\Person::PERSON_TYPE_PHYSICAL_PERSON}}" :nullable="false"></x-common.fields.select-field>
            </div>
            <div class="col-md-3 form-group physical-person-field">
                <x-common.fields.cpf-field id="cpf_cnpj" label="{{__('strings.cpf')}}" value="{{old('cpf_cnpj') ?? $data->cpf_cnpj ?? ''}}"></x-common.fields.cpf-field>
            </div>
            <div class="col-md-3 form-group physical-person-field">
                <x-common.fields.text-field id="rg" label="{{__('strings.rg')}}" value="{{old('rg') ?? $data->rg ?? ''}}"></x-common.fields.text-field>
            </div>
            <div class="col-md-3 form-group physical-person-field">
                <x-common.fields.date-field id="birth_date" label="{{__('strings.birth_date')}}" value="{{old('birth_date') ?? $data->birth_date ?? ''}}"></x-common.fields.date-field>
            </div>
            <div class="col-md-3 form-group physical-person-field">
                <x-common.fields.date-field id="death_date" label="{{__('strings.death_date')}}" value="{{old('death_date') ?? $data->death_date ?? ''}}"></x-common.fields.date-field>
            </div>
            <div class="col-md-3 form-group legal-person-field">
                <x-common.fields.cnpj-field id="cpf_cnpj" label="{{__('strings.cnpj')}}" value="{{old('cpf_cnpj') ?? $data->cpf_cnpj ?? ''}}"></x-common.fields.cnpj-field>
            </div>
            <div class="col-md-3 form-group legal-person-field">
                <x-common.fields.select-field id="contribution_id" label="{{__('strings.contribution')}}" :options="$contributions" value="{{old('contribution_id') ?? $data->contribution_id ?? ''}}"></x-common.fields.select-field>
            </div>
            <div class="col-md-3 form-group legal-person-field">
                <x-common.fields.text-field id="state_registration" label="{{__('strings.state_registration')}}" value="{{old('state_registration') ?? $data->state_registration ?? ''}}"></x-common.fields.text-field>
            </div>
            <div class="col-md-3 form-group legal-person-field">
                <x-common.fields.text-field id="municipal_registration" label="{{__('strings.municipal_registration')}}" value="{{old('municipal_registration') ?? $data->municipal_registration ?? ''}}"></x-common.fields.text-field>
            </div>
            <div class="col-md-3 form-group legal-person-field">
                <x-common.fields.date-field id="birth_date" label="{{__('strings.foundation_date')}}" value="{{old('birth_date') ?? $data->birth_date ?? ''}}"></x-common.fields.date-field>
            </div>
            <div class="col-md-3 form-group legal-person-field">
                <x-common.fields.date-field id="death_date" label="{{__('strings.close_date')}}" value="{{old('death_date') ?? $data->death_date ?? ''}}"></x-common.fields.date-field>
            </div>
        </div>

        <h5 class="font-size-14 pt-4">{{__('strings.address')}}</h5>
        <x-common.forms.address-form :data="$data ?? ''"></x-common.forms.address-form>
        
        <h5 class="font-size-14 pt-4">{{__('strings.contact')}}</h5>
        <div class="row">
            <div class="col-md-3 form-group _hide-from-view">
                <x-common.fields.phone-field id="cell_phone" label="{{__('strings.cell_phone')}}" value="{{old('cell_phone') ?? $data->cell_phone ?? ''}}"></x-common.fields.phone-field>
            </div>
            <div class="col-md-3 form-group">
                <x-common.fields.phone-field id="res_phone" label="{{__('strings.res_phone')}}" value="{{old('res_phone') ?? $data->res_phone ?? ''}}"></x-common.fields.phone-field>
            </div>
            <div class="col-md-6 form-group">
                <x-common.fields.email-field id="email" label="{{__('strings.email')}}" value="{{old('email') ?? $data->email ?? ''}}"></x-common.fields.email-field>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <x-common.fields.text-field id="web_site" label="{{__('strings.web_site')}}" value="{{old('web_site') ?? $data->web_site ?? ''}}"></x-common.fields.text-field>
            </div>
            <div class="col-md-3 form-group">
                <x-common.fields.text-field id="first_contact" label="{{__('strings.first_contact')}}" value="{{old('first_contact') ?? $data->first_contact ?? ''}}"></x-common.fields.text-field>
            </div>
            <div class="col-md-3 form-group">
                <x-common.fields.text-field id="second_contact" label="{{__('strings.second_contact')}}" value="{{old('second_contact') ?? $data->second_contact ?? ''}}"></x-common.fields.text-field>
            </div>
        </div>

        {{$slot}}
        
        <div class="row">
            <div class="col-md-12 form-group">
                <x-common.fields.textarea-field id="observation" label="{{__('strings.observation')}}" value="{{old('observation') ?? $data->observation ?? ''}}"></x-common.fields.textarea-field>
            </div>
        </div>

        <hr class='separator'>
        <x-common.buttons.button title="{{__('strings.save')}}" label="{{__('strings.save')}}" class="btn btn-primary waves-effect waves-light" icon="ri-save-3-line"></x-common.buttons.button>
        <x-common.buttons.button title="{{__('strings.back')}}" label="{{__('strings.back')}}" class="btn btn-secondary waves-effect waves-light" icon="ri-arrow-left-circle-line loading" type="button" href="{{route($backRoute)}}"></x-common.buttons.button>
    </form>
</x-common.panels.page>
        