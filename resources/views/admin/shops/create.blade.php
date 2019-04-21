@extends('admin.layout_2col')

@section('main')

<div class="h3">店舗作成</div>

<form action="{{ route('admin.shops.create') }}" method="post">
    @csrf

    <div class="card mb-3">
        <div class="card-header">事業者</div>
        <div class="card-body">
            @if (isset($vendors))
            <select class="form-control" name="vendor_id" id="vendor_id">
                <option class="muted">-</option>
                @foreach ($vendors as $vendor)
                <option value="{{ $vendor->id }}" {{ (int) old('vendor_id') === $vendor->id ? 'selected' : '' }}>
                    {{ $vendor->name }}
                </option>
                @endforeach
            </select>
            @elseif (isset($vendor))
            <input class="form-control" value="{{ $vendor->name }}" readonly>
            <input type="hidden" name="vendor_id" id="vendor_id" value="{{ $vendor->id }}">
            @endif
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">店舗名</div>
        <div class="card-body">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">紹介文</div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-lg-2 col-md-3">20文字以内</dt>
                <dd class="col-lg-10 col-md-9">
                    <input type="text" class="form-control" name="copy" id="copy" value="{{ old('copy') }}" maxlength="20">
                </dd>
                <dt class="col-lg-2 col-md-3">40文字以内</dt>
                <dd class="col-lg-10 col-md-9">
                    <input type="text" class="form-control" name="short_text" id="short_text" value="{{ old('short_text') }}" maxlength="40">
                </dd>
                <dt class="col-lg-2 col-md-3">制限なし</dt>
                <dd class="col-lg-10 col-md-9">
                    <textarea class="form-control" name="text" id="text">{{ old('text') }}</textarea>
                </dd>
            </dl>
        </div>
    </div>

    <div class="text-right">
        <div class="btn-group">
            <a href="{{ $ref['url'] }}" class="btn btn-light">キャンセル</a>
            <button type="submit" class="btn btn-primary">作成</button>
        </div>
    </div>

</form>

@endsection

@section('sidebar')
<nav class="nav flex-column">
    <a class="nav-link" href="{{ $ref['url'] }}">
        {{ $ref['text'] }}に戻る
    </a>
</nav>
@endsection
