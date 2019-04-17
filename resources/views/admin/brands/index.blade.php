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
<div class="h3 float-left">ブランド一覧</div>

<ol class="breadcrumb float-right ml-auto mb-0 pb-0" style="background-color:transparent;">
    <li class="breadcrumb-item">
        <a href="{{ route('admin.brands.create') }}">新規作成</a>
    </li>
    <li class="breadcrumb-item">
        <a data-toggle="collapse" href="#contents_filter" role="button" aria-expanded="false" aria-controls="contents_filter">
            フィルター
        </a>
    </li>
</ol>

<div class="clearfix"></div>

<div class="card">
@if ($brands->isEmpty())
<div class="card-body">
    ブランドの登録はありません。
</div>
@else
<table class="table mb-0">
    <thead>
        <tr>
            <th class="imagesTh">写真</th>
            <th>ブランド名 <small>[ 事業者 ]</small></th>
            <th>ジャンル</th>
            <th>状態</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
        <tr class="table-status-{{ $brand->status->getSlug() }}">
            <td>
                @if ($brand->images->isNotEmpty())
                <a href="#" style="background-image:url({{ $brand->images->first()->url }})" class="thumbImage rounded"></a>
                @else
                <span class="noImage rounded">No Image</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.brands.show', ['id' => $brand->id]) }}">
                    {{ $brand->name }}
                </a>
                <small>
                    [ <a href="{{ route('admin.vendors.show', ['id' => $brand->vendor->id]) }}">{{ $brand->vendor->name }}</a> ]
                </small>
            </td>
            <td>
                @for ($i = 0; $i < count($brand->genres); $i++)
                {{ $brand->genres[$i]->name }}
                {{ $i !== count($brand->genres) - 1 ? ', ' : '' }}
                @endfor
            </td>
            <td>
                {{ $brand->status->getLabel() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
</div>

@endsection

@section('sidebar')
<a href="{{ route('admin.brands.create') }}">
    ブランドを作成する
</a>
@endsection
