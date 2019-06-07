{{--

    @var array $items

--}}

@php
    $addable = $addable && isset($form) && $form->hasForms();
    $sortable = $sortable && count($items) > 1;
@endphp

<div class="adminGallery{{ $sortable ? ' sortable' : '' }}">
    @foreach ($items as $item)

    <div class="adminGalleryItem">
        <a href="{{ $item->getUrl() }}" style="background-image: url({{ $item->getUrl('thumb') }})">
            <span class="adminGalleryItemName">{{ $item->name }}</span>
            @if ($sortable)

            <span class="sortHandler"><i class="fa fa-arrows"></i></span>

            @endif
        </a>
    </div>

    @endforeach
    @if ($sortable)

    {{ $sortResult }}

    @endif
    @if ($addable)

    {{ $form->toggle()->forgetAttribute('class')->class('adminGalleryAddItem') }}

    @endif
</div>
@if ($sortable)

{{ $sortSubmit }}

@endif

@if ($addable)

    @php
        $modalContext = $modalContext ?? null;
        $modalSize = $modalSize ?? null;
    @endphp

    @push('hidden_form')
        @adminModal([
            'id' => $form->id,
            'title' => $form->title,
            'modalContext' => $modalContext,
            'modalSize' => $modalSize,
        ])

        @foreach ($form as $element)
            {{ $element }}
        @endforeach

        @slot('footer')
            <button class="btn btn-default" data-dismiss="modal">Close</button>
            {{ $form->submit() }}
        @endslot

        @endadminModal
    @endpush

@endif
