@extends('admin.layout_2col')

@section('main')

<div class="h3">出店者詳細</div>

<div class="card mb-3">
    <div class="card-header">名前</div>
    <div class="card-body">{{ $kitchencar->shop->name }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">車両写真</div>
    <div class="card-body">
        @if ($kitchencar->car->images->isNotEmpty())
        <ul class="list-unstyled mb-0">
            @foreach ($kitchencar->car->images as $image)
            <li>
                <figure class="figure">
                  <img src="{{ $image->url }}" class="figure-img img-fluid rounded" alt="">
                  <figcaption class="figure-caption">{{ $image->client_name }}</figcaption>
                </figure>
            </li>
            @endforeach
        </ul>
        @else
        写真はありません
        @endif
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">商品写真</div>
    <div class="card-body">
        @if ($kitchencar->shop->images->isNotEmpty())
        <ul class="list-unstyled mb-0">
            @foreach ($kitchencar->shop->images as $image)
            <li>
                <figure class="figure">
                  <img src="{{ $image->url }}" class="figure-img img-fluid rounded" alt="">
                  <figcaption class="figure-caption">{{ $image->client_name }}</figcaption>
                </figure>
            </li>
            @endforeach
        </ul>
        @else
        写真はありません
        @endif
    </div>
</div>

<div class="text-right">
    <div class="btn-group">
        <a href="#" class="btn btn-primary">編集</a>
    </div>
</div>

@endsection

@section('sidebar')
<div class="h3">管理情報</div>
<div class="card bg-light mb-3">
    <table class="table mb-0">
        <tbody>
            <tr>
                <th>事業者</th>
                <td>
                    <a href="{{ route('admin.vendors.show', ['id' => $kitchencar->car->vendor->id]) }}">
                        {{ $kitchencar->car->vendor->name }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>車両</th>
                <td>
                    <a href="{{ route('admin.cars.show', ['id' => $kitchencar->car->id]) }}">
                        {{ $kitchencar->car->name }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>ブランド</th>
                <td>
                    <a href="{{ route('admin.shops.show', ['id' => $kitchencar->shop->id]) }}">
                        {{ $kitchencar->shop->name }}
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<nav class="nav flex-column">
    <a class="nav-link" href="{{ route('admin.kitchencars.index') }}">
        出店者リスト一覧に戻る
    </a>
</nav>
@endsection
