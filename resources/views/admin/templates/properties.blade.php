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
        @if(isset($hiddenForm))

        {{ $hiddenForm->modalTrigger }}

        @endif

    @endcomponent

    @presenter($hiddenForm)
