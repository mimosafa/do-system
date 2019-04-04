@extends('layout')

@section('content')
<div class="page-header">
    <h3>車両作成</h3>
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
        <form action="{{ route('cars.create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">事業者名</label>
                @if (isset($vendors))
                <select class="form-control" name="vendor_id" id="vendor_id">
                    <option value="">-</option>
                    @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                    @endforeach
                </select>
                @elseif (isset($vendor))
                <input class="form-control" value="{{ $vendor->name }}" readonly>
                <input type="hidden" name="vendor_id" id="vendor_id" value="{{ $vendor->id }}" readonly>
                @endif
            </div>
            <div class="form-group">
                <label for="title">車両名</label>
                <input type="text" class="form-control" name="car_name" id="car_name" value="{{ old('car_name') }}" autocomplete="off" />
            </div>
            <div class="form-group">
                <label for="title">車両ナンバー</label>
                <input type="text" class="form-control" name="vin" id="vin" value="{{ old('vin') }}" />
            </div>
            <div class="text-right">
                <div class="btn-group" role="group">
                    <a href="{{ $ref }}" class="btn btn-default">キャンセル</a>
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
            </div>
        </form>
    </div>
</nav>
@endsection
