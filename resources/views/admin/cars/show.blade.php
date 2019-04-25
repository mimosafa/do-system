@extends('admin.master')

@section('title', '車両詳細')

@section('content_header')
    <h1>車両詳細</h1>
@stop

@section('content')
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-car">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.cars.edit', ['id' => $car->id]) }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">車両情報を編集</h4>
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
                            <label for="name">車両名</label>
                            <input type="text" class="form-control"
                                name="name" id="name"
                                value="{{ old('name') ?? $car->name }}"
                            >
                        </div>
                        <div class="form-group">
                            <label for="vin">車両No.</label>
                            <input type="text" class="form-control"
                                name="vin" id="vin"
                                value="{{ old('vin') ?? $car->vin }}"
                            >
                        </div>
                        <div class="form-group">
                            <label for="status">状態</label>
                            <select name="status" id="status" class="form-control">
                                @foreach($car->status::values() as $status)
                                <option value="{{ $status->getValue() }}" {{ $status->equals($car->status) ? 'selected' : '' }}>
                                    {{ $status->getLabel() }}
                                </option>
                                @endforeach
                            </select>
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
                        <i class="fa fa-car text-muted"></i>
                        {{ $car->name }}
                    </h3>
                    <p class="text-muted text-center">
                        <a href="{{ route('admin.vendors.show', ['id' => $car->vendor->id]) }}">
                            <i class="fa fa-user"></i>
                            {{ $car->vendor->name }}
                        </a>
                    </p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>ID</b>
                            <span class="pull-right">{{ $car->id }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>車両No.</b>
                            <span class="pull-right">{{ $car->vin }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>状態</b>
                            <span class="pull-right">{{ $car->status->getLabel() }}</span>
                        </li>
                    </ul>
                    <a href="#" data-toggle="modal" data-target="#edit-car"
                        class="btn btn-primary btn-block btn-sm">
                        <b>編集する</b>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-md-9">

            <div class="nav-tabs-custom" id="car-contents">

                <ul class="nav nav-tabs nav-justified">
                    <li>
                        <a href="#car-kitchencars" data-toggle="tab">
                            <i class="fa fa-truck"></i> 出店リスト
                        </a>
                    </li>
                    <li>
                        <a href="#car-photos" data-toggle="tab">
                            <i class="fa fa-camera"></i> 写真
                        </a>
                    </li>
                    <li>
                        <a href="#car-permissions" data-toggle="tab">
                            <i class="fa fa-file-text"></i> 営業許可
                        </a>
                    </li>
                </ul>

                <div class="tab-content clearfix">

                    <div class="tab-pane" id="car-kitchencars">
                        <p class="text-center">この車両から出店リストは作成されていません。</p>
                        <a href="{{ route('admin.kitchencars.createWith', ['models' => 'cars', 'id' => $car->id]) }}"
                            class="btn btn-primary btn-sm pull-right">
                            <b>キッチンカー情報作成</b>
                        </a>
                    </div>

                    <div class="tab-pane" id="car-photos">
                        @if ($car->images->isEmpty())
                        <p class="text-center">写真の登録はありません。</p>
                        @else
                            @foreach ($car->images as $image)
                            <img src="{{ $image->url }}" class="img-responsive" alt="{{ $image->client_name }}">
                            @endforeach
                        @endif
                    </div>

                    <div class="tab-pane" id="car-permissions">
                        <p class="text-center">営業許可の登録はありません。</p>
                    </div>

                </div>

            </div><!-- /#car-contents -->

        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#car-contents a:first').tab('show');
        if (location.hash) {
            switch (location.hash) {
                case '#edit-car':
                    $('#edit-car').modal('show');
                    break;
            }
            history.replaceState('', document.title, window.location.pathname);
        }
    </script>
@stop
