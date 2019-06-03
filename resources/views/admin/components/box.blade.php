{{--

    @var string|null $boxContext 'primary'|'info'|'success'|'warning'|'danger'
    @var string|null $id
    @var string|null $title <Unescaped!>
    @var bool|null $collapsable
    @var bool|null $removal

    @var slot
    @var footer

--}}

@php

    // Box contextual class
    $contextClass = '';
    if (isset($boxContext) && is_string($boxContext)) {
        $contextClass = ' box-' . $boxContext;
    }

    // Box id
    $boxAttr = '';
    if (isset($id) && is_string($id)) {
        $boxAttr = ' id="' . $id . '"';
    }

    // Has box tools
    $collapsable = $collapsable ?? false;
    $removal = $removal ?? false;
    $hasTools = $collapsable || $removal;

    // Has box header
    $hasHeader = isset($title) || $hasTools;

@endphp

<div class="box{{ $contextClass }}"{{ $boxAttr }}>
    @if ($hasHeader)

    <div class="box-header with-border">
        @isset($title)

        <h3 class="box-title">{!! $title !!}</h3>

        @endisset
        @if ($hasTools)

        <div class="box-tools pull-right">
            @if ($collapsable)

            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>

            @endif
            @if ($removal)

            <button type="button" class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
            </button>

            @endif
        </div>

        @endif
    </div>

    @endif
    <div class="box-body">
        {{ $slot }}
    </div>
    @isset($footer)

    <div class="box-footer">
        {{ $footer }}
    </div>

    @endisset
</div>
