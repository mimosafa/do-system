@extends('admin.layout_2col')

@section('main')

<div class="h3">ジャンル一覧</div>

<div class="card mb-3">
    <div class="card-body">
        @if ($genres->isEmpty())
        ジャンルの登録はまだありません。
        @else
        <div class="clearfix">
            @foreach ($genres as $genre)
            <a href="#" class="btn btn-link">
                {{ $genre->name }}
            </a>
            @endforeach
        </div>
        @endif
    </div>
</div>

@endsection

@section('sidebar')

<div class="h3">ジャンル追加</div>

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

<form action="{{ route('admin.genres.index') }}" method="post">
    @csrf

    <div class="card mb-3">
        <div class="card-header">ジャンル名</div>
        <div class="card-body">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>
    </div>

    <div class="text-right">
        <div class="btn-group">
            <button type="submit" class="btn btn-primary">追加</button>
        </div>
    </div>

</form>

@endsection
