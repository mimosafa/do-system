@extends('admin.layout')

@section('main')

<div class="h3">車両詳細</div>

<div class="card mb-3">
    <div class="card-header">ID</div>
    <div class="card-body">{{ $car->id }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">事業者</div>
    <div class="card-body">
        <a href="{{ route('admin.vendors.show', ['id' => $car->vendor->id]) }}">
            {{ $car->vendor->name }}
        </a>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">車両名</div>
    <div class="card-body">{{ $car->name }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">状態</div>
    <div class="card-body">{{ $car->status_attr['label'] }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">車両写真</div>
    <div class="card-body">
        <ul>
            @foreach ($car->files as $holder)
            <li>{{ $holder->file->url }}</li>
            @endforeach
        </ul>
    </div>
</div>

<div class="text-right">
    <div class="btn-group">
        <a href="{{ route('admin.cars.edit', ['id' => $car->id]) }}" class="btn btn-primary">編集</a>
    </div>
</div>

@endsection

@section('sidebar')
<a href="{{ route('admin.cars.index') }}">
    車両一覧に戻る
</a>
@endsection
