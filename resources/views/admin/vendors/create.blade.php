@extends('admin.master')

@section('title', '事業者作成')

@section('content_header')
    <h1>
        事業者作成
    </h1>
@stop

@section('content')
<form action="{{ route('admin.vendors.create') }}" method="post">
    @csrf
    <div class="box mb-3">
        <div class="box-header">事業者名</div>
        <div class="box-body">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>
    </div>
    <div class="text-right">
        <div class="btn-group">
            <a href="{{ route('admin.vendors.index') }}" class="btn btn-light">キャンセル</a>
            <button type="submit" class="btn btn-primary">作成</button>
        </div>
    </div>
</form>
@endsection
