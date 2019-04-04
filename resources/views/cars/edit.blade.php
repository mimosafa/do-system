@extends('layout')

@section('content')
<div class="page-header">
    <h3>車両編集</h3>
</div>
<nav class="panel panel-default">
    <div class="panel-body">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
            @endforeach
        </div>
        @endif
        <form
            action="{{ route('cars.edit', ['id' => $car->id]) }}"
            method="POST"
        >
            @csrf
            <div class="form-group">
                <label for="title">車両名</label>
                <input type="text" class="form-control" name="car_name" id="car_name" value="{{ old('car_name') ?? $car->name }}" />
            </div>
            <div class="form-group">
                <label for="title">車両ナンバー</label>
                <input type="text" class="form-control" name="vin" id="vin" value="{{ old('vin') ?? $car->vin }}" />
            </div>
            <div class="form-group">
                <label for="status">状態</label>
                <select name="status" id="status" class="form-control">
                    @foreach(\App\Car::STATUS as $key => $val)
                    <option
                        value="{{ $key }}"
                        {{ $key == old('status', $car->status) ? 'selected' : '' }}
                    >
                        {{ $val['label'] }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="text-right">
                <div class="btn-group" role="group">
                    <a href="{{ route('cars.show', ['id' => $car->id]) }}" class="btn btn-default">キャンセル</a>
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
            </div>
        </form>
    </div>
</nav>
@endsection
