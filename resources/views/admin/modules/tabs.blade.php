{{--

    @var array[string $id:string $title] $indexes
    @var array[string $id:Wstd\View\Presenters\Presenter $content] $contents

--}}

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        @foreach ($indexes as $id => $title)

        <li>
            <a href="#{{ $id }}" data-toggle="tab">{!! $title !!}</a>
        </li>

        @endforeach
    </ul>
    <div class="tab-content clearfix">
        @foreach ($contents as $id => $content)

        <div class="tab-pane" id="{{ $id }}">
            @presenter($content)
        </div>

        @endforeach
    </div>
</div>
