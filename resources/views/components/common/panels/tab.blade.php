@props(["tabs" => []])

@if (count($tabs) > 0)
    <ul class="nav nav-tabs" role="tablist">
        @foreach ($tabs as $tabitem)
            <li class="nav-item">
                <a class="nav-link no-loading @if (isset($tabitem['active']) && $tabitem['active']) active @endif" data-bs-toggle="tab" href="#{{$tabitem['id']}}" role="tab">
                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                    <span class="d-none d-sm-block">{{$tabitem['title']}}</span>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content text-muted">
        {{$slot}}
    </div>
@endif