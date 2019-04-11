@extends('admin.layout_2col')

@section('main')

<div class="h3">事業者詳細</div>

<div class="card mb-3">
    <div class="card-header">ID</div>
    <div class="card-body">{{ $vendor->id }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">事業者名</div>
    <div class="card-body">{{ $vendor->name }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">状態</div>
    <div class="card-body">{{ $vendor->status_attr['label'] }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">車両</div>
    @if ($vendor->cars->isEmpty())
    <div class="card-body">
        車両の登録はありません。
    </div>
    @else
    <table class="table mb-0">
        <thead>
            <tr>
                <th>車両名</th>
                <th>車両ナンバー</th>
                <th>状態</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendor->cars as $car)
            <tr class="{{ $car->status->isActive() ? '' : 'table-secondary' }}">
                <td>
                    <a href="{{ route('admin.cars.show', ['id' => $car->id]) }}">
                        {{ $car->name }}
                    </a>
                </td>
                <td>{{ $car->vin }}</td>
                <td>
                    <span class="badge badge-{{ $car->status_attr['class'] }}">
                        {{ $car->status_attr['label'] }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <div class="card-footer text-right">
        <a href="{{ route('admin.cars.createWith', ['id' => $vendor->id]) }}">車両を追加する</a>
    </div>
</div>

<div class="text-right">
    <div class="btn-group">
        <a href="{{ route('admin.vendors.edit', ['id' => $vendor->id]) }}" class="btn btn-primary">編集</a>
    </div>
</div>

@endsection

@section('sidebar')
<a href="{{ route('admin.vendors.index') }}">
    事業者一覧に戻る
</a>
@endsection
