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
    <div class="card-header">短文コピー</div>
    <div class="card-body">{{ $brand->ad_copy }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">紹介文</div>
    <div class="card-body">{{ $brand->ad_text }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">長文紹介</div>
    <div class="card-body">{{ $brand->description }}</div>
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
