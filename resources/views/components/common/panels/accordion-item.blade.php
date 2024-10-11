@props(['id', 'title', 'active' => false])

<div class="card mb-1 shadow-none">
    <a href="#{{$id}}" class="text-dark no-loading" data-bs-toggle="collapse" aria-expanded="false" aria-controls="{{$id}}">
        <div class="card-header" id="heading{{$id}}">
            <h6 class="m-0">
                {{$title}}
                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
            </h6>
        </div>
    </a>

    <div id="{{$id}}" class="collapse @if ($active) show @endif" aria-labelledby="heading{{$id}}">
        <div class="card-body">
            {{$slot}}
        </div>
    </div>
</div>