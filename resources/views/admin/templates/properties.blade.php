{{--

    @var string $id
    @var string|null $header
    @var array $properties
    @var callable $propertyLabel(): string
    @var callable $propertyValue(): string
    @var Wstd\View\Presenters\Admin\Modules\HiddenForm $hiddenForm

--}}

@adminBox(['id' => $id, 'boxContext' => 'primary',])

    @isset($header)

    <h3 class="text-center">
        {!! $header !!}
    </h3>

    @endisset
    <table class="table">
        <tbody>
            @foreach ($properties as $property)

            <tr>
                <th scope="row">
                    {!! $propertyLabel($property) !!}
                </th>
                <td class="text-right">
                    {!! $propertyValue($property) !!}
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    @if(isset($form))

    {{ $form->toggle() }}

    @push('hidden_form')
        @adminModal([
            'id' => $form->id,
            'title' => $form->title,
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

@endadminBox
