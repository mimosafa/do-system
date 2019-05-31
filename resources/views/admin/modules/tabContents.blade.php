{{--

    @var string $id
    @var array $tabs
    @var array[Wstd\View\Presenters\Presenter] $contents

--}}

@if (count($contents) > 1)

    <div class="nav-tabs-custom" id="{{ $id }}">
        <ul class="nav nav-tabs">
            @foreach ($tabs as $name => $label)
                <li>
                    <a href="#{{ $id }}_{{ $name }}" data-toggle="tab">
                        {!! $label !!}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content clearfix">
            @foreach ($contents as $content)
            <div class="tab-pane" id="{{ $id }}_{{ $content->id }}">
                @presenter($content)
            </div>
            @endforeach
        </div>
    </div>

@else

    @component('admin.modules.box', [
        'id' => $contents[0]->id,
        'title' => $contents[0]->title,
    ])
        @presenter($contents[0])
    @endcomponent

@endif
