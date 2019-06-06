{{--

    @var array $items

--}}

<div class="adminGallery">
    @foreach ($items as $item)

    <div class="adminGalleryItem">
        <a class="adminGalleryItemHandler" href="{{ $item->getUrl() }}" style="background-image: url({{ $item->getUrl('thumb') }})">
            <span class="adminGalleryItemName">{{ $item->name }}</span>
        </a>
    </div>

    @endforeach
    @if (isset($form) && $form->hasForms())

    {{ $form->toggle()->forgetAttribute('class')->class('adminGalleryAddItem') }}

    @endif
</div>

@if (isset($form) && $form->hasForms())

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
