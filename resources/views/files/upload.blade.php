@extends('layout')

@section('content')
<div class="page-header">
    <h3>ファイルアップロード</h3>
</div>
<nav class="panel panel-default">
    <div class="panel-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @elseif(session('success_message'))
        <div class="alert alert-success">
            <ul>
                {!! session('success_message') !!}
            </ul>
        </div>
        @endif
        <form action="{{ route('files.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">ファイル</label>
                <input type="file" name="blob" id="blob">
            </div>
            <div class="form-group">
                <label for="title">ファイル名</label>
                <input type="text" class="form-control" name="client_name" id="client_name" value="{{ old('client_name') }}" autocomplete="off">
            </div>
            <div class="text-right">
                <div class="btn-group" role="group">
                    <a href="#" class="btn btn-default">キャンセル</a>
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
            </div>
        </form>
    </div>
</nav>
@endsection
