{{--

    @var string $title
    @var string $id
    @var Wstd\View\Presenters\Admin\Modules\EntitiesTable $tableInstance
    @var Wstd\View\Presenters\Admin\Modules\FormContainer|null $filter

--}}

@extends('admin.templates.base')

@section('page_title', $title)

@section('content')
    <form method="get">
        @adminBox(compact('id'))
            @presenter($tableInstance)
        @endadminBox

        @if (isset($filter) && $filter->hasForms())

            @php
                $modalContext = $modalContext ?? null;
                $modalSize = $modalSize ?? null;
            @endphp

            @adminModal([
                'id' => $filter->id,
                'title' => $filter->title,
                'modalContext' => $modalContext,
                'modalSize' => $modalSize,
            ])

            @foreach ($filter as $element)
                {{ $element }}
            @endforeach

            @slot('footer')
                <button class="btn btn-default" data-dismiss="modal">Close</button>
                {{ $filter->submit() }}
            @endslot

            @endadminModal

        @endif
    </form>
@endsection
