{{--

    @var null|string $modalSize 'large'|'small'
    @var null|string $modalDismiss
    @var null|bool $modalSubmittable
    @var null|string $modalSubmit
    @var string $id
    @var null|string $title

--}}

@php

    $modalSizeClass = '';
    if (isset($modalSize)) {
        if ($modalSize === 'large') {
            $modalSizeClass .= ' modal-lg';
        }
        else if ($modalSize === 'small') {
            $modalSizeClass .= ' modal-sm';
        }
    }

    $modalDismiss = $modalDismiss ?? 'Close';
    if ($modalSubmittable = $modalSubmittable ?? false) {
        $modalSubmit = $modalSubmit ?? 'Submit';
    }

@endphp

    <div class="modal fade" tabindex="-1" role="dialog" id="{{ $id }}">
        <div class="modal-dialog{{ $modalSizeClass }}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    @isset($title)

                    <h4 class="modal-title">{{ $title }}</h4>

                    @endisset
                </div>
                <div class="modal-body">

                    {{ $slot }}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{ $modalDismiss }}
                    </button>
                    @if ($modalSubmittable)

                    <button type="submit" class="btn btn-primary">{{ $modalSubmit }}</button>

                    @endif
                </div>
            </div>
        </div>
    </div>
