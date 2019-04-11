@extends('admin.layout_2col')

@section('main')

<div class="h3">ブランド詳細</div>

<div class="card mb-3">
    <div class="card-header">ID</div>
    <div class="card-body">{{ $brand->id }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">事業者</div>
    <div class="card-body">
        <a href="{{ route('admin.vendors.show', ['id' => $brand->vendor->id]) }}">
            {{ $brand->vendor->name }}
        </a>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">ブランド名</div>
    <div class="card-body">{{ $brand->name }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">ジャンル</div>
    <div class="card-body">
        @if ($brand->genres->isNotEmpty())
        <div>
            @foreach ($brand->genres as $genre)
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
        <dl class="row">
            <dt class="col-lg-2 col-md-3">20文字以内</dt>
            <dd class="col-lg-10 col-md-9">{{ $brand->ad_copy }}</dd>
            <dt class="col-lg-2 col-md-3">40文字以内</dt>
            <dd class="col-lg-10 col-md-9">{{ $brand->ad_text }}</dd>
            <dt class="col-lg-2 col-md-3">制限なし</dt>
            <dd class="col-lg-10 col-md-9">{{ $brand->description }}</dd>
        </dl>
    </div>
</div>

<div class="text-right">
    <div class="btn-group">
        <a href="{{ route('admin.brands.edit', ['id' => $brand->id]) }}" class="btn btn-primary">編集</a>
    </div>
</div>

@endsection

@section('sidebar')
<a href="{{ route('admin.brands.index') }}">
    ブランド一覧に戻る
</a>
@endsection
