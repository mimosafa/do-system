@extends('layout')

@section('content')
<div class="page-header">
    <h3>ファイル</h3>
</div>
<div class="panel panel-default">
    <div class="panel-heading">ID</div>
    <div class="panel-body">
        {{ $file->id }}
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">ファイル名</div>
    <div class="panel-body">
        {{ $file->client_name }}
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">ファイル・タイプ</div>
    <div class="panel-body">
        {{ $file->mime_type }}
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">ファイル</div>
    <div class="panel-body">
        {{ $file->url }}
    </div>
</div>
<div class="text-right">
    <div class="btn-group btn-group-justified" role="group">
        <a href="#" class="btn btn-default">
            ファイル一覧に戻る
        </a>
        <a href="#" class="btn btn-default">
            ファイルを編集する
        </a>
    </div>
</div>
@endsection
