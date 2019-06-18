{{--

    @var Wstd\View\Presenters\Admin\Modules\EntitiesTable $content
    @var bool $sortable
    @var Illuminate\Contracts\Support\Htmlable $sortState
    @var bool $exchangable
    @var Illuminate\Contracts\Support\Htmlable $toggleOrSubmit
    @var Wstd\View\Presenters\Admin\Modules\FormContainer|null $exchangeForm
    @var string|null $modalContext
    @var string|null $modalSize

--}}

@presenter($content)

@if ($sortable && $content->countRow() > 1)

    {{ $sortState }}

@endif

@if ($exchangable || ($sortable && $content->countRow() > 1))

    {{ $toggleOrSubmit }}

@endif

@if ($exchangable && isset($exchangeForm) && $exchangeForm->hasForms())

    @push('hidden_form')
        @adminModal([
            'id' => $exchangeForm->id,
            'title' => $exchangeForm->title,
            'modalContext' => $modalContext ?? null,
            'modalSize' => $modalSize ?? null,
        ])

        @foreach ($exchangeForm as $element)
            {{ $element }}
        @endforeach

        @slot('footer')
            <button class="btn btn-default" data-dismiss="modal">Close</button>
            {{ $exchangeForm->submit() }}
        @endslot

        @endadminModal
    @endpush

@endif
