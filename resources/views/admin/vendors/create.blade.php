@extends('admin.layout_2col')

@section('main')

<div class="h3">事業者作成</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.vendors.create') }}" method="post">
    @csrf

    <div class="card mb-3">
        <div class="card-header">事業者名</div>
        <div class="card-body">
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

@section('sidebar')
<nav class="nav flex-column">
    <a class="nav-link" href="{{ route('admin.vendors.index') }}">
        事業者一覧に戻る
    </a>
</nav>
@endsection
