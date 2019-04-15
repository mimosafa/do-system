@extends('admin.layout_2col')

@section('main')

<div class="h3">出店者詳細</div>

<div class="card mb-3">
    <div class="card-header">名前</div>
    <div class="card-body">{{ $shop->brand->name }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">車両写真</div>
    <div class="card-body">
        @if ($shop->car->images->isNotEmpty())
        <ul class="list-unstyled mb-0">
            @foreach ($shop->car->images as $image)
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
        @if ($shop->brand->images->isNotEmpty())
        <ul class="list-unstyled mb-0">
            @foreach ($shop->brand->images as $image)
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
                <th>事業者ID</th>
                <td>
                    {{ $shop->car->id }}
                </td>
            </tr>
            <tr>
                <th>事業者</th>
                <td>
                    <a href="{{ route('admin.vendors.show', ['id' => $shop->car->vendor->id]) }}">
                        {{ $shop->car->vendor->name }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>状態</th>
                <td>
                    {{ $shop->car->status_attr['label'] }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<a href="{{ route('admin.shops.index') }}">
    出店者リスト一覧に戻る
</a>
@endsection
