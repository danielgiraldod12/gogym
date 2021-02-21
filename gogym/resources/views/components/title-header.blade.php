<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">{{ $title }}</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @isset($urls)
                        @foreach($urls as $url)
                            <li class="breadcrumb-item {{ $loop->last? 'active':'' }}">
                                @isset($url[1])
                                    <a href="{{ $url[1] }}">{{$url[0]}}</a>
                                @else
                                    {{$url[0]}}
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
