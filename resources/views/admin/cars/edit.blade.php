@extends('admin.layout_2col')

@section('main')

<div class="h3">車両編集</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.cars.edit', ['id' => $car->id]) }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="card mb-3">
        <div class="card-header">車両名</div>
        <div class="card-body">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $car->name }}">
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">車両ナンバー</div>
        <div class="card-body">
            <input type="text" class="form-control" name="vin" id="vin" value="{{ old('vin') ?? $car->vin }}">
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">状態</div>
        <div class="card-body">
            <select name="status" id="status" class="form-control">
                @foreach($car->status::all() as $status)
                <option value="{{ $status->getValue() }}" {{ $status->equals($car->status) ? 'selected' : '' }}>
                    {{ $status->getLabel() }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">車両写真</div>
        <div class="card-body">
            <input type="file" name="image" id="image">
        </div>
    </div>

    <div class="text-right">
        <div class="btn-group">
            <a href="{{ route('admin.cars.show', ['id' => $car->id]) }}" class="btn btn-light">キャンセル</a>
            <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </div>

</form>

@endsection

@section('sidebar')
<nav class="nav flex-column">
    <a class="nav-link" href="{{ route('admin.cars.index') }}">
        車両一覧に戻る
    </a>
</nav>
@endsection
