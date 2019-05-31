{{--

    @var array $formItems
    @var string $id

--}}

    @if (! empty($formItems))

        @foreach ($formItems as $formItem)
            {{ $formItem }}
        @endforeach
        
    @endif
