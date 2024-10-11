<style>
.miniature {
    cursor: pointer;
    padding: 5px;
    border: 1px solid #BBC1C9;
    border-radius: 100%;
    width: 204px;
    height: 204px;
    margin-left: auto;
    margin-right: auto;
}

.miniature:hover {
    opacity: 0.5;
}

.miniature-img {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    position: relative;
    object-fit: cover;
}

.miniature-field {
    display: none;
}
</style>

@props(['id', 'name' => null, 'file' => null, 'label' => null, 'title' => null, 'class' => null, 'required' => false, 'disabled' => false, 'accept' => null, 'maxsize' => null, 'filehref' => null, 'filename' => null, 'miniature' => false])

@php
    $filehref = '/images/no-image.png';
@endphp
@if (!empty($file) && $file instanceof \App\Domain\Common\Models\File)
    @php
        $filename = $file->file_name;
        $filehref = '/download/' . $file->contract_id . '/' . $file->file_name;
    @endphp
@endif

@if ($label) 
    <label class="form-label mt-3">{{$label}} @if ($required) * @endif</label>
@endif
@if ($miniature)
    <a href="javascript:$('#{{$id}}').click();" class="no-loading" title="{{__('strings.click_to_choose')}}">
        <div class="miniature">
            <img id="{{$id}}-miniature-img" class="miniature-img" src="{{$filehref}}">
        </div>
    </a>
@endif
<div class="input">
    <input type="file" id="{{$id}}" name="{{$name ?? $id}}" class="form-control @if ($miniature) miniature-field @endif {{$class}}" {{ $required ? 'required' : '' }} {{ $disabled ? 'readonly' : '' }} accept="{{$accept}}" maxsize="{{$maxsize}}" >
    @if (!$miniature && $filehref && $filename)
        <a href="{{$filehref}}" download="{{$filename}}" title="{{__('strings.click_to_download')}}">{{$filename}}</a>
    @endif
</div>

<script>
    $(document).ready(function() {
        $("#{{$id}}").change(function($e) {
            let reader = new FileReader();
            if($e.target.files && $e.target.files.length > 0) {
                let file = $e.target.files[0];
                reader.readAsDataURL(file);
                reader.onload = () => {
                    if (reader.result != null) {
                        $("#{{$id}}-miniature-img").attr("src", 'data:' + file.type + ';base64,' + reader.result.toString().split(',')[1]);
                    }
                };
            }
        });
    });
</script>