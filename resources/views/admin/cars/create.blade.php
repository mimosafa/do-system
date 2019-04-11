@extends('admin.layout_2col')

@section('main')

<div class="h3">車両作成</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.cars.create') }}" method="post">
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
        <div class="card-header">車両名</div>
        <div class="card-body">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">車両ナンバー</div>
        <div class="card-body">
            <input type="text" class="form-control" name="vin" id="vin" value="{{ old('vin') }}">
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
<a href="{{ $ref['url'] }}">
    {{ $ref['text'] }}に戻る
</a>
@endsection
