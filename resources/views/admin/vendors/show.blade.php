@extends('admin.layout_2col')

@section('main')

<div class="h3">
    事業者詳細
    <small>[ {{ $vendor->name }} ]</small>
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
            <tr class="table-status-{{ $car->status->getSlug() }}">
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
                    {{ $car->status->getLabel() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if ($vendor->isExpandable())
    <div class="card-footer text-right">
        <a href="{{ route('admin.cars.createWith', ['id' => $vendor->id]) }}">車両を追加する</a>
    </div>
    @endif
</div>

<div class="card mb-3">
    <div class="card-header">店舗</div>
    @if ($vendor->shops->isEmpty())
    <div class="card-body">
        店舗の登録はありません。
    </div>
    @else
    <table class="table mb-0">
        <thead>
            <tr>
                <th class="imagesTh">写真</th>
                <th>店舗名</th>
                <th>ジャンル</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendor->shops as $shop)
            <tr class="">
                <td>
                    @if ($shop->images->isNotEmpty())
                    <a href="#" style="background-image:url({{ $shop->images->first()->url }})" class="thumbImage rounded"></a>
                    @else
                    <span class="noImage rounded">No Image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.shops.show', ['id' => $shop->id]) }}">
                        {{ $shop->name }}
                    </a>
                </td>
                <td>
                    @for ($i = 0; $i < count($shop->genres); $i++)
                    {{ $shop->genres[$i]->name }}
                    {{ $i !== count($shop->genres) - 1 ? ', ' : '' }}
                    @endfor
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if ($vendor->isExpandable())
    <div class="card-footer text-right">
        <a href="{{ route('admin.shops.createWith', ['id' => $vendor->id]) }}">店舗を追加する</a>
    </div>
    @endif
</div>

<div class="text-right">
    <div class="btn-group">
        <a href="{{ route('admin.vendors.edit', ['id' => $vendor->id]) }}" class="btn btn-primary">編集</a>
    </div>
</div>

@endsection

@section('sidebar')
<div class="h3">
    管理情報
    <small class="h6">
        <a href="#">編集</a>
    </small>
</div>
<div class="card bg-light mb-3">
    <table class="table mb-0">
        <tbody>
            <tr>
                <th>事業者ID</th>
                <td>{{ $vendor->id }}</td>
            </tr>
            <tr>
                <th>事業者名</th>
                <td>{{ $vendor->name }}</td>
            </tr>
            <tr>
                <th>状態</th>
                <td>{{ $vendor->status->getLabel() }}</td>
            </tr>
        </tbody>
    </table>
</div>
<nav class="nav flex-column">
    <a class="nav-link" href="{{ route('admin.vendors.index') }}">
        事業者一覧に戻る
    </a>
    @if ($vendor->isExpandable())
    <a class="nav-link" href="{{ route('admin.kitchencars.createWith', ['models' => 'vendors', 'id' => $vendor->id]) }}">
        この事業者を出店者リスト追加
    </a>
    @endif
</nav>
@endsection
