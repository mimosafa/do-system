{{--

    @var string|null $id
    @var string|null $boxHeader
    @var $slot
    @var string|null $boxFooter

--}}

<div class="box"{{ isset($id) ? ' id="' . $id . '_box"' : ''}}>
    @if (isset($boxHeader) && $boxHeader)

    <div class="box-header with-border">
        {!! $boxHeader !!}
    </div>

    @endif

    <div class="box-body">
        {{ $slot }}
    </div>

    @if (isset($boxFooter) && $boxFooter)

    <div class="box-footer">
        {!! $boxFooter !!}
    </div>

    @endif
</div>
