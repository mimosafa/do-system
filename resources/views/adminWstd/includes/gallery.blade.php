{{--

    @var $photos

--}}


<div class="adminGallery">
    @foreach ($photos as $photo)
    <div class="adminGalleryItem">
        <a class="adminGalleryItemHandler"
            href="{{ $photo->getUrl() }}"
            style="background-image: url({{ $photo->getUrl('thumb') }})"
        >
            <span class="adminGalleryItemName">{{ $photo->name }}</span>
        </a>
    </div>
@endforeach
    <a href="#" data-toggle="modal" data-target="#add_image_to_car" class="adminGalleryAddItem">
        <b><i class="fa fa-fw fa-plus-circle"></i></b>
    </a>
</div>

@push('hidden_form')

    @component('adminWstd.modules.modal', [
        'id' => 'add_image_to_car',
        'title' => '画像を追加する',
        'submittable' => true,
        'modalSize' => 'large',
    ])
    <input type="file" name="image">
    <input type="hidden" name="add_image_to_car" value="1">
    @endcomponent

@endpush
