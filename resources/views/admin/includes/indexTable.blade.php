{{--

    @see Wstd\Equipment\View\Models\Admin\AbstractIndexViewModel

    @var bool $isDataTable
    @var string $nameOfIndexed
    @var array $itemsOfIndexed
    @var string $thAttributesCallback
    @var array $itemLabelsOfIndexed
    @var Illuminate\Support\Collection $list
    @var string $trAttributesCallback
    @var string $tdAttributesCallback
    @var string ${camelCaseOfProp}ItemCallback

 --}}

<table
    class="table {{ $isDataTable ? 'dataTable' : '' }}"
    id="{{ $nameOfIndexed }}-table"
    data-page-length='100'
>
    <thead>
        <tr>
            @foreach ($itemsOfIndexed as $item)
            <th {!! $thAttributesCallback($item) !!}>
                {!! $itemLabelsOfIndexed[$item] !!}
            </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $model)
        <tr {!! $trAttributesCallback($model) !!}>
            @foreach ($itemsOfIndexed as $item)
            <td {!! $tdAttributeCallback($item, $model) !!}>
                {!! ${$strCamelCase($item) . 'ItemCallback'}($model) !!}
            </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

@if ($isDataTable)
    @push('js')
    <script>
        $('#{{ $nameOfIndexed }}-table').DataTable();
    </script>
    @endpush
@endif
