{{--

    @var array[Illuminate\Contracts\Support\Htmlable] $formElements
    @var string $addFormId
    @var string $collectionName

--}}

@extends('admin.modules.table')

@if (isset($formElements) && $formElements)

    @push('hidden_form')
        @component('admin.modules.modal', [
            'id' => $addFormId,
            'title' => $collectionName . 'を追加',
            'modalSubmittable' => true,
        ])

        @foreach ($formElements as $formElement)
            {{ $formElement }}
        @endforeach

        @endcomponent
    @endpush

@endif
