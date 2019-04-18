@extends('admin.layout_2col')

@section('main')

<div class="h3">車両詳細</div>

<div class="card mb-3">
    <div class="card-header">車両名</div>
    <div class="card-body">{{ $car->name }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">車両ナンバー</div>
    <div class="card-body">{{ $car->vin }}</div>
</div>

<div class="card mb-3">
    <div class="card-header">車両写真</div>
    <div class="card-body">
        @if ($car->images->isNotEmpty())
        <ul class="list-unstyled mb-0">
            @foreach ($car->images as $image)
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
        <a href="{{ route('admin.cars.edit', ['id' => $car->id]) }}" class="btn btn-primary">編集</a>
    </div>
</div>

@endsection

@section('sidebar')
<div class="h3">管理情報</div>
<div class="card bg-light mb-3">
    <table class="table mb-0">
        <tbody>
            <tr>
                <th>車両ID</th>
                <td>
                    {{ $car->id }}
                </td>
            </tr>
            <tr>
                <th>事業者</th>
                <td>
                    <a href="{{ route('admin.vendors.show', ['id' => $car->vendor->id]) }}">
                        {{ $car->vendor->name }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>状態</th>
                <td>
                    {{ $car->status->getLabel() }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<nav class="nav flex-column">
    <a class="nav-link" href="{{ route('admin.cars.index') }}">
        車両一覧に戻る
    </a>
    <a class="nav-link" href="{{ route('admin.kitchencars.createWith', ['models' => 'cars', 'id' => $car->id]) }}">
        この車両を出店者リスト追加
    </a>
</nav>
@endsection
