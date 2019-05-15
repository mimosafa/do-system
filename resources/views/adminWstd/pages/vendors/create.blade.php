@extends('adminWstd.base')

@section('title', '新規事業者作成')

@section('content_header')
    @includeWhen($errors->any(), 'admin.components.alertError')
    <h1>新規事業者作成</h1>
@endsection

@section('content')
<form action="{{ route('admin.vendors.create') }}" method="post" autocomplete="off">
    @csrf
    <div class="box mb-3">
        <div class="box-header">事業者名</div>
        <div class="box-body">
            <div class="input-group">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">作成</button>
                </span>
            </div>
        </div>
    </div>
</form>
@endsection
