{{--

    @var ?string $title
    @var ?string $headerAddOn

    @var ?string $footer

--}}

<div class="box">

    @if (isset($title) && $title)
    <div class="box-header with-border">
        <h3 class="box-title">{!! $title !!}</h3>
        @if (isset($headerAddOn) && $headerAddOn)
        {!! $headerAddOn !!}
        @endif
    </div><!-- /.box-header -->
    @endif

    <div class="box-body">
        {{ $slot }}
    </div><!-- /.box-body -->

    @if (isset($footer) && $footer)
    <div class="box-footer">
        {!! $footer !!}
    </div><!-- box-footer -->
    @endif

</div>
