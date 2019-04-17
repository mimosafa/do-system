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

    @if (isset($vendors))
    <div class="card mb-3">
        <div class="card-header">事業者</div>
        <div class="card-body">
            <select class="form-control" name="vendor_id" id="vendor_id">
                <option class="muted">-</option>
                @foreach ($vendors as $_vendor)
                <option value="{{ $_vendor->id }}" {{ (int) old('vendor_id') === $_vendor->id ? 'selected' : '' }}>
                    {{ $_vendor->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    @else

    @if (isset($cars))
    <div class="card mb-3">
        <div class="card-header">車両</div>
        @if ($cars->isNotEmpty())
        <table class="table mb-0">
            <thead>
                <tr>
                    @if ($next === 'store')
                    <th style="width: 60px;">選択</th>
                    @endif
                    <th class="imagesTh">写真</th>
                    <th>車両名</th>
                    <th>車両ナンバー</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $_car)
                <tr class="{{ $_car->status->isRegistered() ? '' : 'table-secondary' }}">
                    @if ($next === 'store')
                    <td>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="radio"
                                name="car_id" id="car_id-{{ $_car->id }}" value="{{ $_car->id }}"
                            >
                        </div>
                    </td>
                    @endif
                    <td>
                        @if ($_car->images->isNotEmpty())
                        <a href="#" style="background-image:url({{ $_car->images->first()->url }})" class="thumbImage rounded"></a>
                        @else
                        <span class="noImage rounded">No Image</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-{{ $_car->status_attr['class'] }}">
                            {{ $_car->status_attr['label'] }}
                        </span>
                        {{ $_car->name }}
                    </td>
                    <td>{{ $_car->vin }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="card-body">
            「{{ $vendor->name }}」に車両が登録されていません。まずは
            <a href="{{ route('admin.cars.createWith', ['id' => $vendor->id]) }}">車両を登録</a>
            してください。
        </div>
        @endif
    </div>
    @elseif (isset($car))
    <input type="hidden" name="car_id" id="car_id" value="{{ $car->id }}">
    @endif

    @if (isset($brands))
    <div class="card mb-3">
        <div class="card-header">ブランド</div>
        @if ($brands->isNotEmpty())
        <table class="table mb-0">
            <thead>
                <tr>
                    @if ($next === 'store')
                    <th style="width: 60px;">選択</th>
                    @endif
                    <th class="imagesTh">写真</th>
                    <th>ブランド名</th>
                    <th>ジャンル</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $_brand)
                <tr class="">
                    @if ($next === 'store')
                    <td>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="radio"
                                name="brand_id" id="brand_id-{{ $_brand->id }}" value="{{ $_brand->id }}"
                            >
                        </div>
                    </td>
                    @endif
                    <td>
                        @if ($_brand->images->isNotEmpty())
                        <a href="#" style="background-image:url({{ $_brand->images->first()->url }})" class="thumbImage rounded"></a>
                        @else
                        <span class="noImage rounded">No Image</span>
                        @endif
                    </td>
                    <td>
                        {{ $_brand->name }}
                    </td>
                    <td>
                        @for ($i = 0; $i < count($_brand->genres); $i++)
                        {{ $_brand->genres[$i]->name }}
                        {{ $i !== count($_brand->genres) - 1 ? ', ' : '' }}
                        @endfor
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="card-body">
            「{{ $vendor->name }}」にブランドが登録されていません。まずは
            <a href="{{ route('admin.brands.createWith', ['id' => $vendor->id]) }}">ブランドを登録</a>
            してください。
        </div>
        @endif
    </div>
    @elseif (isset($brand))
    <input type="hidden" name="brand_id" id="brand_id" value="{{ $brand->id }}">
    @endif

    @endif

    @if ($next !== 'disabled')
    <div class="text-right">
        <div class="btn-group">
            <a href="#" class="btn btn-light">キャンセル</a>
            <button type="submit" class="btn btn-primary">{{ $next === 'store' ? '作成' : '続ける' }}</button>
        </div>
    </div>
    @endif

</form>

@endsection

@section('sidebar')

@if (isset($vendor))
<div class="h3">選択済</div>
<div class="card bg-light mb-3">
    <table class="table mb-0">
        <tbody>
            <tr>
                <th>事業者ID</th>
                <td>
                    {{ $vendor->id }}
                </td>
            </tr>
            <tr>
                <th>事業者</th>
                <td>
                    <a href="{{ route('admin.vendors.show', ['id' => $vendor->id]) }}">
                        {{ $vendor->name }}
                    </a>
                </td>
            </tr>
            @if (isset($car))
            <tr>
                <th>車両</th>
                <td>
                    <a href="{{ route('admin.cars.show', ['id' => $car->id]) }}">
                        {{ $car->name }}
                    </a>
                </td>
            </tr>
            @endif
            @if (isset($brand))
            <tr>
                <th>ブランド</th>
                <td>
                    <a href="{{ route('admin.brands.show', ['id' => $brand->id]) }}">
                        {{ $brand->name }}
                    </a>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endif
<nav class="nav flex-column">
    <a class="nav-link" href="{{ route('admin.shops.index') }}">
        出店者リスト一覧に戻る
    </a>
</nav>
@endsection
