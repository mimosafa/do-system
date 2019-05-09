{{--

    @var array $tabs
    @ver string $nameOfEntity
    @var array $belongs

--}}

@php
    $tabId = 'belongs-to-' . $nameOfEntity;
@endphp

<div class="nav-tabs-custom" id="{{ $tabId }}">
    <ul class="nav nav-tabs nav-justified">
        @foreach ($tabs as $name => $label)
            <li>
                <a href="#{{ $name }}-{{ $tabId }}" data-toggle="tab">
                    {!! $label !!}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content clearfix">
        @foreach ($belongs as $content)
        <div class="tab-pane" id="{{ $content->nameOfBelongs() }}-{{ $tabId }}">
            @include($content->getBladeTemplate(), $content)
        </div>
        @endforeach
    </div>
</div>

@section('js')
    <script>
        $('#{{ $tabId }} a:first').tab('show');
    </script>
@stop
