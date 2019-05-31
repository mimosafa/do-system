{{--

    @var Wstd\View\Presenters\Admin\Modules\FormContainer $formContainer
    @var string $id
    @var string $title
    @var string $modalSize
    @var string|Illuminate\Contracts\Support\Htmlable $modalFooter

--}}

    @if ($formContainer->hasForms())

        @push('hidden_form')

        @component('admin.modules.modal', compact('id', 'title', 'modalSize', 'modalFooter'))

        @presenter($formContainer)

        @endcomponent

        @endpush

    @endif
