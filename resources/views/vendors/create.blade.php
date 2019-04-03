@extends('layout')

@section('content')
<div class="page-header">
    <h3>事業者作成</h3>
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
        @endif
        <form action="{{ route('vendors.create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">事業者名</label>
                <input type="text" class="form-control" name="vendor_name" id="vendor_name" value="{{ old('vendor_name') }}" />
            </div>
            <div class="text-right">
                <div class="btn-group" role="group">
                    <a href="{{ route('vendors.index') }}" class="btn btn-default">キャンセル</a>
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
            </div>
        </form>
    </div>
</nav>
@endsection
