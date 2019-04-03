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
