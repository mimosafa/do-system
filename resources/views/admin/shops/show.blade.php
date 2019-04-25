@extends('admin.master')

@section('title', '店舗詳細')

@section('content_header')
    <h1>店舗詳細</h1>
@stop

@section('content')
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-shop">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.shops.edit', ['id' => $shop->id]) }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">店舗情報を編集</h4>
                    </div>
                    <div class="modal-body">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="name">店舗名</label>
                            <input type="text" class="form-control"
                                name="name" id="name"
                                value="{{ old('name') ?? $shop->name }}"
                            >
                        </div>
                        <div class="form-group">
                            <label for="status">状態</label>
                            <select name="status" id="status" class="form-control">
                                @foreach($shop->status::values() as $status)
                                <option value="{{ $status->getValue() }}" {{ $status->equals($shop->status) ? 'selected' : '' }}>
                                    {{ $status->getLabel() }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status" style="display: block;">ジャンル</label>
                            @forelse ($all_genres as $genre)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                    {{ in_array($genre->id, $genre_ids) ? 'checked' : '' }}
                                > {{ $genre->name }}
                            </label>
                            @empty
                            まだジャンルは作成されていません。<a href="{{ route('admin.genres.index') }}">作成しますか？</a>
                            @endforelse
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-advertisements">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.shops.edit', ['id' => $shop->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="name" value="{{ $shop->name }}">
                    <input type="hidden" name="status" value="{{ $shop->status }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">店舗紹介文を編集</h4>
                    </div>
                    <div class="modal-body">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="name">20文字以内</label>
                            <input type="text" class="form-control" name="copy" id="copy"
                                value="{{ old('copy') ?? $shop->copy }}" maxlength="20">
                        </div>
                        <div class="form-group">
                            <label for="name">40文字以内</label>
                            <input type="text" class="form-control" name="short_text" id="short_text"
                                value="{{ old('short_text') ?? $shop->short_text }}" maxlength="40">
                        </div>
                        <div class="form-group">
                            <label for="name">文字数制限なし</label>
                            <textarea class="form-control"
                                name="text" id="text"
                            >{{ old('text') ?? $shop->text }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="row">
        <div class="col-md-3">

            <div class="box">
                <div class="box-body">
                    <span class="noImage img-circle"
                        style="width: 100px; height: 100px; margin: 0 auto; line-height: 100px;"
                    >No Image</span>
                    <h3 class="text-center">
                        <i class="fa fa-coffee text-muted"></i>
                        {{ $shop->name }}
                    </h3>
                    <p class="text-muted text-center">
                        <a href="{{ route('admin.vendors.show', ['id' => $shop->vendor->id]) }}">
                            <i class="fa fa-user"></i>
                            {{ $shop->vendor->name }}
                        </a>
                    </p>
                    <table class="table" style="margin-bottom: 20px; border-bottom: 1px solid #ddd;">
                        <tbody>
                            <tr>
                                <th style="border-color: #ddd; white-space: nowrap;">
                                    ID
                                </th>
                                <td style="border-color: #ddd; text-align: right;">
                                    {{ $shop->id }}
                                </td>
                            </tr>
                            <tr>
                                <th style="border-color: #ddd; white-space: nowrap;">
                                    状態
                                </th>
                                <td style="border-color: #ddd; text-align: right;">
                                    {{ $shop->status->getLabel() }}
                                </td>
                            </tr>
                            <tr>
                                <th style="border-color: #ddd; white-space: nowrap;">
                                    ジャンル
                                </th>
                                <td style="border-color: #ddd; text-align: right;">
                                    @if ($shop->genres->isNotEmpty())
                                        @foreach ($shop->genres as $genre)
                                        <a href="#" class="">{{ $genre->name }}</a>
                                        @if (! $loop->last)
                                        <span>, </span>
                                        @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" data-toggle="modal" data-target="#edit-shop"
                        class="btn btn-primary btn-block btn-sm">
                        <b>編集する</b>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-md-9">

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-comment"></i> 説明文
                    </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group" id="shop-texts">
                        <div class="panel box">
                            <div class="box-header">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#shop-texts" href="#collapseOne" aria-expanded="true" class="">
                                        20文字以内
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
                                <div class="box-body">
                                    {{ $shop->copy }}
                                    <a href="#" data-toggle="modal" data-target="#edit-advertisements">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="panel box">
                            <div class="box-header">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#shop-texts" href="#collapseTwo" class="collapsed" aria-expanded="false">
                                        40文字以内
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="box-body">
                                    {{ $shop->short_text }}
                                    <a href="#" data-toggle="modal" data-target="#edit-advertisements">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="panel box">
                            <div class="box-header">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#shop-texts" href="#collapseThree" class="collapsed" aria-expanded="false">
                                        制限なし
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="box-body">
                                    {{ $shop->text }}
                                    <a href="#" data-toggle="modal" data-target="#edit-advertisements">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div>

            <div class="nav-tabs-custom" id="shop-contents">

                <ul class="nav nav-tabs nav-justified">
                    <li>
                        <a href="#shop-kitchencars" data-toggle="tab">
                            <i class="fa fa-truck"></i> 出店リスト
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
        if (location.hash) {
            switch (location.hash) {
                case '#edit-shop':
                    $('#edit-shop').modal('show');
                    break;
            }
            history.replaceState('', document.title, window.location.pathname);
        }
    </script>
@stop
