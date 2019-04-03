@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <!-- 何か -->
            </div>
            <div class="column col-md-8">
                <div class="page-header">
                    <h3>事業者詳細</h3>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">ID</div>
                    <div class="panel-body">
                        {{ $vendor->id }}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">事業者名</div>
                    <div class="panel-body">
                        {{ $vendor->name }}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">状態</div>
                    <div class="panel-body">
                        {{ $vendor->status_label }}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">車両</div>
                    @if (count($vendor->cars) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>車両名名</th>
                                <th>車両No.</th>
                                <th>状態</th>
                                <th>ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendor->cars as $car)
                            <tr>
                                <td><a href="#">{{ $car->name }}</a></td>
                                <td>{{ $car->vin }}</td>
                                <td>
                                    <span class="label {{ $car->status_class }}">{{ $car->status_label }}</span>
                                </td>
                                <td>{{ $car->id }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="panel-body">
                        車両の登録はありません
                    </div>
                    @endif
                    @if ($vendor->can_add_cars)
                    <div class="panel-body">
                        <div class="text-right">
                            <a href="#" class="btn btn-default btn-block">
                                車両を追加する
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="text-right">
                    <div class="btn-group btn-group-justified" role="group">
                        <a href="{{ route('vendors.index') }}" class="btn btn-default">
                            事業者一覧に戻る
                        </a>
                        <a href="{{ route('vendors.edit', ['id' => $vendor->id]) }}" class="btn btn-default">
                            事業者を編集する
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
