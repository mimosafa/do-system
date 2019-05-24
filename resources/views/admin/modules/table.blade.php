{{--

    @var string $id
    @var string $beforeIndex
    @var Illuminate\Support\Collection $collection
    @var array[string] $items
    @var callable $thAttributes(string): string
    @var callable $th(string): string
    @var callable $trAttributes(Wstd\Domain\Models\EntityInterface): string
    @var callable $tdAttribute(string, Wstd\Domain\Models\EntityInterface): string
    @var callable|bool $getTdMethod(string) callable: string
    @var string $emptyMessage
    @var string $afterIndex

--}}

    {!! $beforeTable !!}
    @if (count($collection) !== 0)

    <table class="table dataTable" id="{{ $id }}_table" data-page-length='100'>
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
            @foreach ($collection as $row)

            <tr{!! $trAttributes($row) !!}>
                @foreach ($items as $item)

                <td{!! $tdAttribute($item, $row) !!}>
                    {!! $getTdMethod($item) ? $getTdMethod($item)($row) : $td($item, $row) !!}
                </td>

                @endforeach
            </tr>

            @endforeach
        </tbody>
    </table>

    @else

    {!! $emptyMessage !!}

    @endif
    {!! $afterTable !!}

@push('js')

    <script>
        $('#{{ $id }}_index_table').DataTable();
    </script>

@endpush
