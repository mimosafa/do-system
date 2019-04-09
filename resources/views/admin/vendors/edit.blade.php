@extends('admin.layout')

@section('main')

<div class="h3">事業者編集</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.vendors.edit', ['id' => $vendor->id]) }}" method="post">
    @csrf

    <div class="card mb-3">
        <div class="card-header">事業者名</div>
        <div class="card-body">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $vendor->name }}">
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">状態</div>
        <div class="card-body">
            <select name="status" id="status" class="form-control">
                @foreach($vendor->status->getAttributes() as $key => $attr)
                <option value="{{ $vendor->status::{$key}() }}" {{ $vendor->status->equals($vendor->status::{$key}()) ? 'selected' : '' }}>
                    {{ $attr['label'] }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="text-right">
        <div class="btn-group">
            <a href="{{ route('admin.vendors.show', ['id' => $vendor->id]) }}" class="btn btn-light">キャンセル</a>
            <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </div>

</form>

@endsection

@section('sidebar')
<a href="{{ route('admin.vendors.index') }}">
    事業者一覧に戻る
</a>
@endsection
