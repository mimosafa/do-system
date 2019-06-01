{{--

    @var string $title
    @var Wstd\View\Presenters\Admin\Templates\Properties $propertiesInstance

--}}

@component('admin.templates.show', ['title' => $title])

    <div class="row">
        <div class="col-md-3">
            @presenter($propertiesInstance)
        </div>
        <div class="col-md-9">
            @adminBox(['title' => '画像'])
                @presenter($galleryInstance)
            @endadminBox
        </div>
    </div>

@endcomponent
