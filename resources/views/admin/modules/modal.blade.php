{{--

    @var null|string $modalSize 'large'|'small'
    @var string $id
    @var null|string $title
    @var string|Illuminate\Contracts\Support\Htmlable $modalFooter

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
                @isset($modalFooter)

                <div class="modal-footer">
                    {!! $modalFooter !!}
                </div>

                @endisset
            </div>
        </div>
    </div>
