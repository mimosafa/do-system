@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-4">
            <!-- 何か -->
        </div>
        <div class="column col-md-8">
            <div class="page-header">
                <h3>事業者一覧</h3>
            </div>
            <div class="panel panel-default">
                <table class="table">
                    <thead>
                    <tr>
                        <th>事業者名</th>
                        <th>状態</th>
                        <th>ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vendors as $vendor)
                        <tr>
                            <td>
                                <a href="{{ route('vendors.show', ['id' => $vendor->id]) }}">{{ $vendor->name }}</a>
                            </td>
                            <td>
                                <span class="label {{ $vendor->status_class}}">{{ $vendor->status_label }}</span>
                            </td>
                            <td class="muted">{{ $vendor->id }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="panel-body">
                    <div class="text-right">
                        <a href="{{ route('vendors.create') }}" class="btn btn-default btn-block">
                            事業者を追加する
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
