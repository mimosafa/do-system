{{--

    @var ?string $modalSize null|small|large
    @var string $id
    @var string $title
    @var ?string $dismissText
    @var bool $submittable
    @var ?string $submitText

--}}

@php
$modalSizeClass = '';
if (isset($modalSize)) {
    if ($modalSize === 'large') {
        $modalSizeClass = ' modal-lg';
    }
    else if ($modalSize === 'small') {
        $modalSizeClass = ' modal-sm';
    }
}
$dismissText = $dismissText ?? '閉じる';
$submitText = $submitText ?? '送信';
@endphp

<div class="modal{{ $modalSizeClass }} fade" tabindex="-1" role="dialog" id="{{ $id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @if (isset($title))
                <h4 class="modal-title">{{ $title }}</h4>
                @endif
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ $dismissText }}</button>
                @if ($submittable)
                <button type="submit" class="btn btn-primary">{{ $submitText }}</button>
                @endif
            </div>
        </div>
    </div>
</div>
