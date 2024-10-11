@props(['title'])

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{$title}}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach ($breadcrumb as $i => $item)
                        @php
                            $item = __('strings.' . str_replace("-", "_", $item));
                        @endphp
                        @if ($i + 1 < count($breadcrumb))
                            <li class="breadcrumb-item"><a href="javascript: void(0);" class="no-loading">{{$item}}</a></li>
                        @else
                            <li class="breadcrumb-item active">{{$item}}</li>
                        @endif
                    @endforeach
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{$slot}}
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->