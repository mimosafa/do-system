<table
    class="table {{ $isDataTable ? 'dataTable' : '' }}"
    id="{{ $nameOfIndexed }}-table"
    data-page-length='100'
>
    <thead>
        <tr>
            @foreach ($itemsOfIndexed as $item)
            <th>
                {!! $itemLabelsOfIndexed[$item] !!}
            </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $var)
        <tr {!! $trAttributesCallback($var) !!}>
            @foreach ($itemsOfIndexed as $item)
            <td>
                {!! ${$item . 'ItemCallback'}($var) !!}
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
