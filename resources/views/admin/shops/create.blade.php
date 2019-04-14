@extends('admin.layout_2col')

@section('main')

<div class="h3">出店者リストに新規追加</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.shops.create') }}" method="post">
    @csrf

    <div class="card mb-3">
        <div class="card-header">事業者</div>
        <div class="card-body">
            @if (isset($vendors))
            <select class="form-control" name="vendor_id" id="vendor_id">
                <option class="muted">-</option>
                @foreach ($vendors as $vendor)
                <option value="{{ $vendor->id }}" {{ (int) old('vendor_id') === $vendor->id ? 'selected' : '' }}>
                    {{ $vendor->name }}
                </option>
                @endforeach
            </select>
            @elseif (isset($vendor))
            <input class="form-control" value="{{ $vendor->name }}" readonly>
            @endif
        </div>
    </div>

    @if (isset($cars))
    <div class="card mb-3">
        <div class="card-header">車両</div>
        <table class="table mb-0">
            <thead>
                <tr>
                    <th style="width: 60px;">選択</th>
                    <th class="imagesTh">写真</th>
                    <th>車両名</th>
                    <th>車両ナンバー</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendor->cars as $car)
                <tr class="{{ $car->status->isActive() ? '' : 'table-secondary' }}">
                    <td>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="radio"
                                name="car_id" id="car_id-{{ $car->id }}" value="{{ $car->id }}"
                            >
                        </div>
                    </td>
                    <td>
                        @if ($car->images->isNotEmpty())
                        <a href="#" style="background-image:url({{ $car->images->first()->url }})" class="thumbImage rounded"></a>
                        @else
                        <span class="noImage rounded">No Image</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-{{ $car->status_attr['class'] }}">
                            {{ $car->status_attr['label'] }}
                        </span>
                        {{ $car->name }}
                    </td>
                    <td>{{ $car->vin }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if (isset($brands))
    <div class="card mb-3">
        <div class="card-header">ブランド</div>
        <table class="table mb-0">
            <thead>
                <tr>
                    <th style="width: 60px;">選択</th>
                    <th class="imagesTh">写真</th>
                    <th>ブランド名</th>
                    <th>ジャンル</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendor->brands as $brand)
                <tr class="">
                    <td>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="radio"
                                name="brand_id" id="brand_id-{{ $brand->id }}" value="{{ $brand->id }}"
                            >
                        </div>
                    </td>
                    <td>
                        @if ($brand->images->isNotEmpty())
                        <a href="#" style="background-image:url({{ $brand->images->first()->url }})" class="thumbImage rounded"></a>
                        @else
                        <span class="noImage rounded">No Image</span>
                        @endif
                    </td>
                    <td>
                        {{ $brand->name }}
                    </td>
                    <td>
                        @for ($i = 0; $i < count($brand->genres); $i++)
                        {{ $brand->genres[$i]->name }}
                        {{ $i !== count($brand->genres) - 1 ? ', ' : '' }}
                        @endfor
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div class="text-right">
        <div class="btn-group">
            <a href="#" class="btn btn-light">キャンセル</a>
            <button type="submit" class="btn btn-primary">{{ $filled ? '作成' : '続ける' }}</button>
        </div>
    </div>

</form>

@endsection

@section('sidebar')

<a href="{{ route('admin.shops.index') }}">
    出店者リストに戻る
</a>
@endsection
