@extends('admin.master')

@section('title', '店舗詳細')

@section('content_header')
    <h1>店舗詳細</h1>
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
                        {{ $shop->name }}
                    </h3>
                    <p class="text-muted text-center">
                        <a href="{{ route('admin.vendors.show', ['id' => $shop->vendor->id]) }}">
                            {{ $shop->vendor->name }}
                        </a>
                    </p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>ID</b>
                            <span class="pull-right">{{ $shop->id }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>状態</b>
                            <span class="pull-right">{{ $shop->status->getLabel() }}</span>
                        </li>
                    </ul>
                    <a href="{{ route('admin.shops.edit', ['id' => $shop->id]) }}"
                        class="btn btn-primary btn-block btn-sm">
                        <b>編集する</b>
                    </a>
                </div>
            </div>

            <div class="box">
                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">ジャンル</h3>
                    </div>
                    <div class="box-body">
                        @if ($shop->genres->isNotEmpty())
                        <div>
                            @foreach ($shop->genres as $genre)
                            <a href="#" class="btn btn-link">
                                {{ $genre->name }}
                            </a>
                            @endforeach
                        </div>
                        @else
                        ジャンルは登録されていません。
                        @endif
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-9">

            <div class="nav-tabs-custom" id="shop-contents">

                <ul class="nav nav-tabs">
                    <li>
                        <a href="#shop-kitchencars" data-toggle="tab">
                            <i class="fa fa-list"></i> 出店リスト
                        </a>
                    </li>
                    <li>
                        <a href="#shop-advertisements" data-toggle="tab">
                            <i class="fa fa-comment-o"></i> 説明文
                        </a>
                    </li>
                    <li>
                        <a href="#shop-photos" data-toggle="tab">
                            <i class="fa fa-camera"></i> 写真
                        </a>
                    </li>
                </ul>

                <div class="tab-content clearfix">

                    <div class="tab-pane" id="shop-kitchencars">
                        <p class="text-center">この店舗から出店リストは作成されていません。</p>
                        <a href="{{ route('admin.kitchencars.createWith', ['models' => 'shops', 'id' => $shop->id]) }}"
                            class="btn btn-primary btn-sm pull-right">
                            <b>出店リスト作成</b>
                        </a>
                    </div>

                    <div class="tab-pane" id="shop-advertisements">
                        <dl class="">
                            <dt class="">20文字以内</dt>
                            <dd class="">{{ $shop->copy }}</dd>
                            <dt class="">40文字以内</dt>
                            <dd class="">{{ $shop->short_text }}</dd>
                            <dt class="">制限なし</dt>
                            <dd class="">{{ $shop->text }}</dd>
                        </dl>
                    </div>

                    <div class="tab-pane" id="shop-photos">
                        @if ($shop->images->isEmpty())
                        <p class="text-center">写真の登録はありません。</p>
                        @else
                            @foreach ($shop->images as $image)
                            <img src="{{ $image->url }}" class="img-responsive" alt="{{ $image->client_name }}">
                            @endforeach
                        @endif
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection

@section('js')
    <script>
        $('#shop-contents a:first').tab('show');
    </script>
@stop
