{{--

    @see Wstd\View\Presenters\Admin\Modules\Table

    @var string $tableClasses
    @var string $tableAttributes <Unescaped!!>
    @var array $items
    @var callable $thAttributes(string): string <Unescaped!!>
    @var callable $th(string): string <Unescaped!!>
    @var array|Traversable $collection
    @var callable $trAttributes(mixed): string <Unescaped!!>
    @var callable $tdAttributes(string, mixed): string <Unescaped!!>
    @var callable $td(string, mixed): string <Unescaped!!>
    @var string $emptyMessage <Unescaped!!>
    @var bool $isDataTable
    @var string|null $id
    @var array $dataTableOptions

--}}

<table class="{{ $tableClasses }}"{!! $tableAttributes !!}>
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
        @forelse ($collection as $row)

        <tr{!! $trAttributes($row) !!}>
            @foreach ($items as $item)

            <td{!! $tdAttributes($item, $row) !!}>
                {!! $td($item, $row) !!}
            </td>

            @endforeach
        </tr>

        @empty

        <tr>
            <td colspan="{{ count($items) }}">
                {!! $emptyMessage !!}
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@if ($isDataTable && isset($id) && is_string($id))
    @push('js')

    <script>
        $('#{{ $id }}').DataTable({!! json_encode($dataTableOptions) !!});
    </script>

    @endpush
@endif
