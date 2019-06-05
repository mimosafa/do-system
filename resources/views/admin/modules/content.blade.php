{{--

    @var Wstd\View\Presenters\Presenter $content
    @var Wstd\View\Presenters\Admin\Modules\FormContainer|null $form

--}}

@if ($content instanceof \Wstd\View\Presenters\Presenter)
    @presenter($content)
@else
    {!! $content !!}
@endif

@if (isset($form) && $form->hasForms())

    {{ $form->toggle() }}

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
