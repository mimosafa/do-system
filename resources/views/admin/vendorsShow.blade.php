{{--

    @var string $title
    @var Wstd\View\Presenters\Admin\Templates\Properties $propertiesInstance
    @var Wstd\View\Presenters\Admin\Modules\TabContents $belongs

--}}

@component('admin.templates.show', ['title' => $title])

    <div class="row">
        <div class="col-md-3">
            @presenter($properties)
        </div>
        <div class="col-md-9">
            @presenter($belongs)
        </div>
    </div>

@endcomponent
