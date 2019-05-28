{{--

    @var string $id
    @var string|null $header
    @var array $properties
    @var callable $propertyLabel(): string
    @var callable $propertyValue(): string
    @var array $formElements

--}}

    @component('admin.modules.box', ['id' => $id])
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
        @if(! empty($formElements))

        <a href="#" data-toggle="modal" data-target="#edit_{{ $id /* Modal ID */ }}" class="btn btn-primary btn-block btn-sm">
            <b>Edit</b>
        </a>

        @endif

    @endcomponent

@if(! empty($formElements))
    @push('hidden_form')

    @component('admin.modules.modal', [
        'id' => 'edit_' . $id, /* Modal ID */
        'title' => 'Edit Properties',
        'modalSubmittable' => true,
    ])

    @foreach ($formElements as $formElement)
        {{ $formElement }}
    @endforeach

    @endcomponent

    @endpush
@endif
