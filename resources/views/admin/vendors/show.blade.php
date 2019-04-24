@extends('admin.master')

@section('title', '事業者詳細')

@section('content_header')
    <h1>事業者詳細</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">

            <div class="box">
                <div class="box-body">
                    <span class="noImage img-circle"
                        style="width: 100px; height: 100px; margin: 0 auto; line-height: 100px;"
                    >No Image</span>
                    <h3 class="text-center">
                        <i class="fa fa-user text-muted"></i>
                        {{ $vendor->name }}
                    </h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>ID</b>
                            <span class="pull-right">{{ $vendor->id }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>状態</b>
                            <span class="pull-right">{{ $vendor->status->getLabel() }}</span>
                        </li>
                    </ul>
                    <a href="{{ route('admin.vendors.edit', ['id' => $vendor->id]) }}"
                        class="btn btn-primary btn-block btn-sm">
                        <b>編集する</b>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-md-9">

            <div class="nav-tabs-custom" id="vendor-contents">

                <ul class="nav nav-tabs nav-justified">
                    <li>
                        <a href="#vendor-cars" data-toggle="tab">
                            <i class="fa fa-car"></i> 車両
                        </a>
                    </li>
                    <li>
                        <a href="#vendor-shops" data-toggle="tab">
                            <i class="fa fa-coffee"></i> 店舗
                        </a>
                    </li>
                    <li>
                        <a href="#vendor-items" data-toggle="tab">
                            <i class="fa fa-cutlery"></i> 商品
                        </a>
                    </li>
                </ul>

                <div class="tab-content clearfix">

                    <div class="tab-pane" id="vendor-cars">
                        @if ($vendor->cars->isEmpty())
                        <p class="text-center">車両の登録はありません。</p>
                        @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="imagesTh">写真</th>
                                    <th>車両名</th>
                                    <th>車両ナンバー</th>
                                    <th>状態</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendor->cars as $car)
                                <tr class="table-status-{{ $car->status->getSlug() }}">
                                    <td>
                                        @if ($car->images->isNotEmpty())
                                        <a href="#" style="background-image:url({{ $car->images->first()->url }})" class="thumbImage"></a>
                                        @else
                                        <span class="noImage">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.cars.show', ['id' => $car->id]) }}">
                                            {{ $car->name }}
                                        </a>
                                    </td>
                                    <td>{{ $car->vin }}</td>
                                    <td>{{ $car->status->getLabel() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        @if ($vendor->isExpandable())
                        <a class="btn btn-primary btn-sm pull-right"
                            href="{{ route('admin.cars.createWith', ['id' => $vendor->id]) }}"
                        >車両を追加する</a>
                        @endif
                    </div>

                    <div class="tab-pane" id="vendor-shops">
                        @if ($vendor->shops->isEmpty())
                        <p class="text-center">店舗の登録はありません。</p>
                        @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="imagesTh">写真</th>
                                    <th>店舗名</th>
                                    <th>ジャンル</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendor->shops as $shop)
                                <tr class="">
                                    <td>
                                        @if ($shop->images->isNotEmpty())
                                        <a href="#" style="background-image:url({{ $shop->images->first()->url }})" class="thumbImage"></a>
                                        @else
                                        <span class="noImage">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.shops.show', ['id' => $shop->id]) }}">
                                            {{ $shop->name }}
                                        </a>
                                    </td>
                                    <td>
                                        @for ($i = 0; $i < count($shop->genres); $i++)
                                        {{ $shop->genres[$i]->name }}
                                        {{ $i !== count($shop->genres) - 1 ? ', ' : '' }}
                                        @endfor
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        @if ($vendor->isExpandable())
                        <a class="btn btn-primary btn-sm pull-right"
                            href="{{ route('admin.shops.createWith', ['id' => $vendor->id]) }}"
                        >店舗を追加する</a>
                        @endif
                    </div>

                    <div class="tab-pane" id="vendor-items">
                        <p class="text-center">商品の登録はありません。</p>
                    </div>

                </div>

            </div><!-- /#vendor-contents -->

        </div>
    </div><!-- /.row -->
@endsection

@section('js')
    <script>
        $('#vendor-contents a:first').tab('show');
    </script>
@stop
