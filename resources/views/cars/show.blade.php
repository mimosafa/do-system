@extends('layout')

@section('content')
<div class="page-header">
    <h3>車両詳細</h3>
</div>
<div class="panel panel-default">
    <div class="panel-heading">ID</div>
    <div class="panel-body">
        {{ $car->id }}
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">事業者名</div>
    <div class="panel-body">
        <a href="{{ route('vendors.show', ['id' => $car->vendor->id]) }}">{{ $car->vendor->name }}</a>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">車両名</div>
    <div class="panel-body">
        {{ $car->name }}
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">車両ナンバー</div>
    <div class="panel-body">
        {{ $car->vin }}
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">状態</div>
    <div class="panel-body">
        {{ $car->status_label }}
    </div>
</div>
<div class="text-right">
    <div class="btn-group btn-group-justified" role="group">
        <a href="{{ route('cars.index') }}" class="btn btn-default">
            車両一覧に戻る
        </a>
        <a href="#" class="btn btn-default">
            車両を編集する
        </a>
    </div>
</div>
@endsection
