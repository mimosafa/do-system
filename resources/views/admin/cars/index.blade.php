@extends('admin.layout')

@section('main')
<div class="h3">車両一覧</div>

<div class="card">
@if ($cars->isEmpty())
<div class="card-body">
    車両の登録はありません。
</div>
@else
<table class="table mb-0">
    <thead>
        <tr>
            <th>車両名 <small>[ 事業者 ]</small></th>
            <th>車両ナンバー</th>
            <th>状態</th>
            <th>ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
        <tr class="{{ $car->status->isActive() ? '' : 'table-secondary' }}">
            <td>
                <a href="{{ route('admin.cars.show', ['id' => $car->id]) }}">
                    {{ $car->name }}
                </a>
                <small>
                    [ <a href="{{ route('admin.vendors.show', ['id' => $car->vendor->id]) }}">{{ $car->vendor->name }}</a> ]
                </small>
            </td>
            <td>
                {{ $car->vin }}
            </td>
            <td>
                <span class="badge badge-{{ $car->status_attr['class'] }}">
                    {{ $car->status_attr['label'] }}
                </span>
            </td>
            <td>
                {{ $car->id }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
</div>

@endsection

@section('sidebar')
<a href="{{ route('admin.cars.create') }}">
    車両を作成する
</a>
@endsection
