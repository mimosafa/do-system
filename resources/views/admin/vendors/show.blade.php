@extends('admin.layout_2col')

@section('main')

<div class="h3">事業者詳細</div>

<div class="card mb-3">
    <div class="card-header">事業者名</div>
    <div class="card-body">{{ $vendor->name }}</div>
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
                <th class="imagesTh">写真</th>
                <th>車両名</th>
                <th>車両ナンバー</th>
                <th>状態</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendor->cars as $car)
            <tr class="{{ $car->status->isActive() ? '' : 'table-secondary' }}">
                <td>
                    @if ($car->images->isNotEmpty())
                    <a href="#" style="background-image:url({{ $car->images->first()->url }})" class="thumbImage rounded"></a>
                    @else
                    <span class="noImage rounded">No Image</span>
                    @endif
                </td>
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

<div class="card mb-3">
    <div class="card-header">ブランド</div>
    @if ($vendor->brands->isEmpty())
    <div class="card-body">
        ブランドの登録はありません。
    </div>
    @else
    <table class="table mb-0">
        <thead>
            <tr>
                <th class="imagesTh">写真</th>
                <th>ブランド名</th>
                <th>ジャンル</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendor->brands as $brand)
            <tr class="">
                <td>
                    @if ($brand->images->isNotEmpty())
                    <a href="#" style="background-image:url({{ $brand->images->first()->url }})" class="thumbImage rounded"></a>
                    @else
                    <span class="noImage rounded">No Image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.brands.show', ['id' => $brand->id]) }}">
                        {{ $brand->name }}
                    </a>
                </td>
                <td>
                    @for ($i = 0; $i < count($brand->genres); $i++)
                    {{ $brand->genres[$i]->name }}
                    {{ $i !== count($brand->genres) - 1 ? ', ' : '' }}
                    @endfor
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <div class="card-footer text-right">
        <a href="{{ route('admin.brands.createWith', ['id' => $vendor->id]) }}">ブランドを追加する</a>
    </div>
</div>

<div class="text-right">
    <div class="btn-group">
        <a href="{{ route('admin.vendors.edit', ['id' => $vendor->id]) }}" class="btn btn-primary">編集</a>
    </div>
</div>

@endsection

@section('sidebar')
<div class="h3">管理情報</div>
<div class="card bg-light mb-3">
    <table class="table mb-0">
        <tbody>
            <tr>
                <th>事業者ID</th>
                <td>
                    {{ $vendor->id }}
                </td>
            </tr>
            <tr>
                <th>状態</th>
                <td>
                    {{ $vendor->status_attr['label'] }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<nav class="nav flex-column">
    <a class="nav-link" href="{{ route('admin.vendors.index') }}">
        事業者一覧に戻る
    </a>
    <a class="nav-link" href="{{ route('admin.shops.createWith', ['models' => 'vendors', 'id' => $vendor->id]) }}">
        この事業者を出店者リスト追加
    </a>
</nav>
@endsection
