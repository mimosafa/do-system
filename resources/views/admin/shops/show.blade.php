@extends('admin.layout_2col')

@section('main')

<div class="h3">店舗詳細</div>

<div class="card mb-3">
    <div class="card-header">店舗名</div>
    <div class="card-body">{{ $shop->name }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">ジャンル</div>
    <div class="card-body">
        @if ($shop->genres->isNotEmpty())
        <div>
            @foreach ($shop->genres as $genre)
            <a href="#" class="btn btn-link">
                {{ $genre->name }}
            </a>
            @endforeach
        </div>
        @else
        ジャンルは登録されていません。
        @endif
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">紹介文</div>
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-lg-2 col-md-3">20文字以内</dt>
            <dd class="col-lg-10 col-md-9">{{ $shop->advertisement->title_secondary }}</dd>
            <dt class="col-lg-2 col-md-3">40文字以内</dt>
            <dd class="col-lg-10 col-md-9">{{ $shop->advertisement->description_primary }}</dd>
            <dt class="col-lg-2 col-md-3">制限なし</dt>
            <dd class="col-lg-10 col-md-9">{{ $shop->advertisement->content_primary }}</dd>
        </dl>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">店舗写真</div>
    <div class="card-body">
        @if ($shop->images->isNotEmpty())
        <ul class="list-unstyled mb-0">
            @foreach ($shop->images as $image)
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
        <a href="{{ route('admin.shops.edit', ['id' => $shop->id]) }}" class="btn btn-primary">編集</a>
    </div>
</div>

@endsection

@section('sidebar')
<div class="h3">管理情報</div>
<div class="card bg-light mb-3">
    <table class="table mb-0">
        <tbody>
            <tr>
                <th>店舗ID</th>
                <td>
                    {{ $shop->id }}
                </td>
            </tr>
            <tr>
                <th>事業者</th>
                <td>
                    <a href="{{ route('admin.vendors.show', ['id' => $shop->vendor->id]) }}">
                        {{ $shop->vendor->name }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>状態</th>
                <td>
                    {{ $shop->status->getLabel() }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<nav class="nav flex-column">
    <a class="nav-link" href="{{ route('admin.shops.index') }}">
        店舗一覧に戻る
    </a>
    <a class="nav-link" href="{{ route('admin.kitchencars.createWith', ['models' => 'shops', 'id' => $shop->id]) }}">
        この店舗を出店者リスト追加
    </a>
</nav>
@endsection
