{{--

    @var string $id

    @var string|null $modalContext 'primary'|'info'|'success'|'warning'|'danger'
    @var string|null $modalSize 'large'|'Large'|'L'|'l'|'small'|'Small'|'S'|'s'...
    @var string|null $title

    @var $slot
    @var $footer

--}}

@php

    // Modal contextual class
    $contextClass = '';
    if (isset($modalContext) && is_string($modalContext)) {
        $contextClass = ' modal-' . $modalContext;
    }

    // Modal size class
    $sizeClass = '';
    if (isset($modalSize) && is_string($modalSize)) {
        if (strtolower($modalSize)[0] === 'l') {
            $sizeClass = ' modal-lg';
        }
        else if (strtolower($modalSize)[0] === 's') {
            $sizeClass = ' modal-sm';
        }
    }

@endphp

<div class="modal{{ $contextClass }} fade" tabindex="-1" role="dialog" id="{{ $id }}">
    <div class="modal-dialog{{ $sizeClass }}">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                @isset($title)

                <h4 class="modal-title">{{ $title }}</h4>

                @endisset
            </div>

            <div class="modal-body">

                {{ $slot }}

            </div>

            <div class="modal-footer">
                {{ $footer ?? '' }}
            </div>

        </div>
    </div>
</div>
