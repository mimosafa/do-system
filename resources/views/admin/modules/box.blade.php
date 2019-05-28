{{--

    @var string|null $id
    @var string|null $title
    @var $slot
    @var string|null $footer

--}}

<div class="box"{!! isset($id) ? ' id="' . e($id) . '_box"' : '' !!}>
    @if (isset($title) && $title)

    <div class="box-header with-border">
        <h3 class="box-title">{!! $title !!}</h3>
    </div>

    @endif

    <div class="box-body">
        {{ $slot }}
    </div>

    @if (isset($footer) && $footer)

    <div class="box-footer">
        {!! $footer !!}
    </div>

    @endif
</div>
