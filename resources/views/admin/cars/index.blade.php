@extends('admin.master')

@section('title', '車両一覧')

@section('content_header')
    <h1>
        車両一覧
        <small>
            <a href="#" data-toggle="modal" data-target="#list-advenced-filter"><i class="fa fa-filter"></i></a>
        </small>
    </h1>
@stop

@section('content')
    <div class="modal fade" tabindex="-1" role="dialog" id="list-advenced-filter">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="get" class="py-3">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">フィルター</h4>
                    </div>
                    <div class="modal-body">
                        <dl>
                            <dt>状態でフィルター</dt>
                            <dt>
                                @foreach ($all_statuses as $status)
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="status[]" value="{{ $status->getValue() }}"
                                        {{ in_array($status->getValue(), $shown_statuses) ? 'checked' : '' }}
                                    > {{ $status->getLabel() }}
                                </label>
                                @endforeach
                            </dt>
                        </dl>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                        <button type="submit" class="btn btn-primary">適用</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="box">
        @if ($cars->isEmpty())
        <div class="box-body">
            車両の登録はありません。
        </div>
        @else
        <div class="box-body">
            <table class="table dataTable" id="carsTable" data-page-length='100'>
                <thead>
                    <tr>
                        <th class="imagesTh">写真</th>
                        <th>車両名 <small>[ 事業者 ]</small></th>
                        <th>車両ナンバー</th>
                        <th>状態</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <tr class="table-status-{{ $car->status->getSlug() }}">
                        <td>
                            @if ($car->images->isNotEmpty())
                            <a href="#" style="background-image:url({{ $car->images->first()->url }})" class="thumbImage rounded"></a>
                            @else
                            <span class="noImage rounded">No Image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.cars.show', ['id' => $car->id]) }}">
                                {{ $car->name }}
                            </a>
                            <small>
                                [ <a href="{{ route('admin.vendors.show', ['id' => $car->vendor->id]) }}">{{ $car->vendor->name }}</a> ]
                            </small>
                        </td>
                        <td>
                            {{ $car->vin }}
                        </td>
                        <td>
                            {{ $car->status->getLabel() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
@stop

@section('js')
    <script>
        $('#carsTable').DataTable({
            ordering: false,
        });
    </script>
@stop
