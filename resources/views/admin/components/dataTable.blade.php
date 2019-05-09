{{--

    @see Wstd\View\Models\Admin\Components\AbstractDataTable

    @var Illuminate\Support\Collection $collection
    @var string $emptyText
    @var string $name
    @var string $label
    @var bool $isDataTable
    @var array $items
    @var callable $thAttributes(): string
    @var callable $th(): string
    @var callable $trAttributes(): string
    @var callable $strStudly(): string
    @var ?callable $td{StudlyCaseItem}()
    @var callable $tdAttributes(): string
    @var callable $td(): string

--}}

@if ($collection->isEmpty())
    <p class="text-center text-warning h5">
        {{ $emptyText }}
    </p>
@else

@php
    $tdMethods = [];
@endphp

<table
    class="table {{ $isDataTable ? 'dataTable' : '' }}"
    id="{{ $name }}-table"
    data-page-length='100'
>
    <thead>
        <tr>
            @foreach ($items as $item)
            <th{!! $thAttributes($item) !!}>
                {!! $th($item) !!}
            </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $value)
        <tr{!! $trAttributes($value) !!}>
            @foreach ($items as $item)
                @php
                    if (isset($tdMethods[$item])) {
                        $tdMethod = $tdMethods[$item];
                    }
                    else {
                        $methodStr = 'td' . $strStudly($item);
                        $tdMethod = ${$methodStr} ?? null;
                        $tdMethods[$item] = $tdMethod;
                    }
                @endphp
            <td{!! $tdAttributes($item, $value) !!}>
                {!! $tdMethod ? $tdMethod($value) : $td($item, $value) !!}
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

@endif
