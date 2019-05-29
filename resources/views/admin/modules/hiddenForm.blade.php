{{--

    @var Wstd\View\Presenters\Admin\Modules\FormContainer $formContainer
    @var string $id
    @var string $title
    @var string $modalSize
    @var string $modalDismiss
    @var bool modalSubmittable
    @var string $modalSubmit

--}}

    @if ($formContainer->hasForms())

        @push('hidden_form')

        @component('admin.modules.modal', compact(
            'id', 'title', 'modalSize', 'modalDismiss', 'modalSubmittable', 'modalSubmit'
        ))

        @presenter($formContainer)

        @endcomponent

        @endpush

    @endif
