{{--

    @var array $indexes
    @var array $contents

--}}

@if (count($contents) > 1)

    @include('admin.modules.tabs', compact('indexes', 'contents'))

@else

    @php
        $content = array_shift($contents);
    @endphp

    @adminBox([
        'id' => $content->id,
        'title' => $content->title,
        'boxContext' => $boxContext ?? null,
    ])

    @presenter($content)

    @endadminBox

@endif
