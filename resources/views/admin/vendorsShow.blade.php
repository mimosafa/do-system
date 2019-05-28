{{--

    @var string $title
    @var Wstd\View\Presenters\Admin\Templates\Properties $propertiesInstance
    @var Wstd\View\Presenters\Admin\Modules\TabContents $belongs

--}}

@extends('admin.templates.base')

@section('page_title', $title)

@section('content')
    <form method="post">
        @csrf
        <div class="row">
            <div class="col-md-3">
                @presenter($propertiesInstance)
            </div>
            <div class="col-md-9">
                @presenter($belongs)
            </div>
        </div>
        @stack('hidden_form')
    </form>
@endsection
