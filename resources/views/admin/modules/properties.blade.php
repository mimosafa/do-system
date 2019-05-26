{{--

    @var string $id

--}}

    @php
        extract($propertiesInstance->toArray());
    @endphp
    @component('admin.modules.box', ['id' => $id . '_properties'])

    <h3 class="text-center">
        {!! $header !!}
    </h3>
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

    @endcomponent
