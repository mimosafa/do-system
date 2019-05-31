{{--

    @var Wstd\View\Presenters\Admin\Modules\FormContainer $formContainer
    @var string $id

    @var string|null $title
    @var string|null $modalSize

    @var string|Illuminate\Contracts\Support\Htmlable $modalFooter

--}}

@if ($formContainer->hasForms())
    @push('hidden_form')
        @adminModal(compact('id', 'title', 'modalSize'))

            @foreach ($formContainer as $form)
                {{ $form }}
            @endforeach

            @slot('footer')
                <button class="btn btn-default" data-dismiss="modal">Close</button>
                {!! $formContainer->submit() !!}
            @endslot

        @endadminModal
    @endpush
@endif
