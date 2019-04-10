@extends('admin.layout')

@section('main')

<div class="h3">ファイルアップロード</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@elseif(session('success_message'))
<div class="alert alert-success">
    <ul class="list-unstyled mb-0">
        <li>{!! session('success_message') !!}</li>
    </ul>
</div>
@endif

<form action="{{ route('admin.files.create') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="card mb-3">
        <div class="card-header">ファイル</div>
        <div class="card-body">
            <input type="file" name="file" id="file">
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">ファイル名</div>
        <div class="card-body">
            <input type="text" class="form-control" name="client_name" id="client_name" value="{{ old('client_name') }}">
        </div>
    </div>

    <div class="text-right">
        <div class="btn-group">
            <a href="#" class="btn btn-light">キャンセル</a>
            <button type="submit" class="btn btn-primary">アップロード</button>
        </div>
    </div>

</form>

@endsection
