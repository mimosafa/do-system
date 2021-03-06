{{--

    @var string $title
    @var Wstd\View\Presenters\Admin\Templates\Properties $properties
    @var Wstd\View\Presenters\Admin\Modules\Contents $contents

--}}

@component('admin.templates.show', ['title' => $title])

    <div class="row">
        <div class="col-md-3">
            @presenter($properties)
            @presenter($availableBrands)
        </div>
        <div class="col-md-9">
            @presenter($contents)
        </div>
    </div>

@endcomponent
