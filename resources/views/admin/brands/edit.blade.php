@extends('admin.layout_2col')

@section('main')

<div class="h3">ブランド編集</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.brands.edit', ['id' => $brand->id]) }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="card mb-3">
        <div class="card-header">ブランド名</div>
        <div class="card-body">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $brand->raw_name }}" {{ $brand->raw_name ? '' : 'placeholder=' . $brand->vendor->name }}>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">短文コピー <small>※ 20文字以内</small></div>
        <div class="card-body">
            <input type="text" class="form-control" name="ad_copy" id="ad_copy" value="{{ old('ad_copy') ?? $brand->ad_copy }}" maxlength="20">
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">紹介文 <small>※ 40文字以内</small></div>
        <div class="card-body">
            <input type="text" class="form-control" name="ad_text" id="ad_text" value="{{ old('ad_text') ?? $brand->ad_text }}" maxlength="40">
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">長文紹介</div>
        <div class="card-body">
            <input type="text" class="form-control" name="description" id="description" value="{{ old('description') ?? $brand->description }}">
        </div>
    </div>

    <div class="text-right">
        <div class="btn-group">
            <a href="{{ route('admin.brands.show', ['id' => $brand->id]) }}" class="btn btn-light">キャンセル</a>
            <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </div>

</form>

@endsection

@section('sidebar')
<a href="{{ route('admin.brands.index') }}">
    ブランド一覧に戻る
</a>
@endsection
