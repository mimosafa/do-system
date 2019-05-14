{{--

    @require public/wstd/js/do-system.js

    @var ?string $modalSize null|small|large
    @var ?bool $submittable
    @var ?string $dismissText
    @var ?string $submitText
    @var string $id
    @var string $title

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
$submittable = $submittable ?? false;
$dismissText = $dismissText ?? '閉じる';
if ($submittable) {
    $submitText = $submitText ?? '送信';
}
@endphp

<div class="modal fade" tabindex="-1" role="dialog" id="{{ $id }}">
    <div class="modal-dialog{{ $modalSizeClass }}">
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
