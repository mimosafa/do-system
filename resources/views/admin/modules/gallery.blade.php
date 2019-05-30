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

        <a href="#" data-toggle="modal" data-target="#{{ $hiddenForm->id }}" class="adminGalleryAddItem">
            <i class="fa fa-fw fa-plus-circle"></i>
        </a>

    </div>

    @presenter($hiddenForm)
