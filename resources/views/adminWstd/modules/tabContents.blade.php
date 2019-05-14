{{--

    @var string $id Tab & tab contents ID
    @var array $tabs
    @var array[Wstd\View\Admin\ViewModelInterface] $contents

--}}

@if (count($contents) > 1)

    <div class="nav-tabs-custom" id="{{ $id }}">
        <ul class="nav nav-tabs {{--nav-justified--}}">
            @foreach ($tabs as $name => $label)
                <li>
                    <a href="#{{ $name }}_{{ $id }}" data-toggle="tab">
                        {!! $label !!}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content clearfix">
            @foreach ($contents as $content)
            <div class="tab-pane" id="{{ $content->id() }}_{{ $id }}">
                @include($content->template(), $content)
            </div>
            @endforeach
        </div>
    </div>

@else

    @component('adminWstd.modules.contentBox', [
        'title' => $contents[0]->title(),
    ])
        @include($contents[0]->template(), $contents[0])
    @endcomponent

@endif
