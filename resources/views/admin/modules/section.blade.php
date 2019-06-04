{{--

--}}

@isset($header)

    <h4>{{ $header }}</h4>

@endisset

@if ($content)
    <p>
        {{ $content }}
    </p>
@else
    <p class="text-muted">No Content</p>
@endif
