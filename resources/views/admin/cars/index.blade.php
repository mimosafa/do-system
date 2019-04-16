@extends('admin.layout_1col')

@section('hidden_content')
<div class="container collapse" id="contents_filter">
    <form action="" method="get" class="py-3">
        <legend class="h4">フィルター</legend>
        <dl class="row">
            <dt class="col-md-2">状態でフィルター</dt>
            <dd class="form-group col-md-10">
                @foreach ($all_statuses as $status)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="status[]"
                        id="status-{{ $status->getValue() }}" value="{{ $status->getValue() }}"
                        {{ in_array($status->getValue(), $shown_statuses) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="status-{{ $status->getValue() }}">
                        {{ $status->getLabel() }}
                    </label>
                </div>
                @endforeach
            </dd>
        </dl>
        <hr>
        <button type="submit" class="btn btn-primary btn-sm">フィルター</button>
    </form>
</div>
@endsection

@section('main')
<div class="h3 float-left">車両一覧</div>

<ol class="breadcrumb float-right ml-auto mb-0 pb-0" style="background-color:transparent;">
    <li class="breadcrumb-item">
        <a href="{{ route('admin.cars.create') }}">新規作成</a>
    </li>
    <li class="breadcrumb-item">
        <a data-toggle="collapse" href="#contents_filter" role="button" aria-expanded="false" aria-controls="contents_filter">
            フィルター
        </a>
    </li>
</ol>

<div class="clearfix"></div>

<div class="card">
    @if ($cars->isEmpty())
    <div class="card-body">
        車両の登録はありません。
    </div>
    @else
    <table class="table mb-0">
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
    @endif
</div>

@endsection

@section('sidebar')
<a href="{{ route('admin.cars.create') }}">
    車両を作成する
</a>
@endsection
