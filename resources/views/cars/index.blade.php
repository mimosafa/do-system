@extends('layout')

@section('content')
<div class="page-header">
    <h3>車両一覧</h3>
</div>
<div class="panel panel-default">
    <table class="table">
        <thead>
            <tr>
                <th>事業者</th>
                <th>車両名名</th>
                <th>車両No.</th>
                <th>状態</th>
                <th>ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>
                    <a href="{{ route('vendors.show', ['id' => $car->vendor->id]) }}">
                        {{ $car->vendor->name }}
                    </a>
                </td>
                <td>
                    <a href="#">
                        {{ $car->name }}
                    </td>
                <td>{{ $car->vin }}</td>
                <td>
                    <span class="label {{ $car->status_class }}">{{ $car->status_label }}</span>
                </td>
                <td class="muted">{{ $car->id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="panel-body">
        <div class="text-right">
            <a href="#" class="btn btn-default btn-block">
                車両を追加する
            </a>
        </div>
    </div>
</div>
@endsection
