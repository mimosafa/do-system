@extends('admin.layout_1col')

@section('main')
<div class="h3 float-left">出店者リスト</div>

<ol class="breadcrumb float-right ml-auto mb-0 pb-0" style="background-color:transparent;">
    <li class="breadcrumb-item">
        <a href="#">すべて</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.shops.create') }}">新規作成</a>
    </li>
</ol>

<div class="clearfix"></div>

<div class="card">
@if ($shops->isEmpty())
<div class="card-body">
    出店者が登録されていません。
</div>
@else
<table class="table mb-0">
    <thead>
        <tr>
            <th class="imagesTh">車両</th>
            <th class="imagesTh">商品</th>
            <th>出店名</th>
            <th>ジャンル</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shops as $shop)
        <tr class="">
            <td>
                @if ($shop->car->images->isNotEmpty())
                <a href="#" style="background-image:url({{ $shop->car->images->first()->url }})" class="thumbImage rounded"></a>
                @else
                <span class="noImage rounded">No Image</span>
                @endif
            </td>
            <td>
                @if ($shop->brand->images->isNotEmpty())
                <a href="#" style="background-image:url({{ $shop->brand->images->first()->url }})" class="thumbImage rounded"></a>
                @else
                <span class="noImage rounded">No Image</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.shops.show', ['id' => $shop->id]) }}">
                    {{ $shop->brand->name }}
                </a>
            </td>
            <td>
                @for ($i = 0; $i < count($shop->brand->genres); $i++)
                {{ $shop->brand->genres[$i]->name }}
                {{ $i !== count($shop->brand->genres) - 1 ? ', ' : '' }}
                @endfor
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
</div>

@endsection

@section('sidebar')
<a href="{{ route('admin.shops.create') }}">
    出店者を追加する
</a>
@endsection
