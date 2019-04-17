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
<div class="h3 float-left">事業者一覧</div>

<ol class="breadcrumb float-right ml-auto mb-0 pb-0" style="background-color:transparent;">
    <li class="breadcrumb-item">
        <a href="{{ route('admin.vendors.create') }}">
            新規作成
        </a>
    </li>
    <li class="breadcrumb-item">
        <a data-toggle="collapse" href="#contents_filter" role="button" aria-expanded="false" aria-controls="contents_filter">
            フィルター
        </a>
    </li>
</ol>

<div class="clearfix"></div>

<div class="card">
    @if ($vendors->isEmpty())
    <div class="card-body">
        事業者の登録はありません。
    </div>
    @else
    <table class="table mb-0">
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>事業者名</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendors as $vendor)
            <tr class="table-status-{{ $vendor->status->getSlug() }}">
                <td style="color: #ccc;">
                    {{ $vendor->id }}
                </td>
                <td>
                    <a href="{{ route('admin.vendors.show', ['id' => $vendor->id]) }}">
                        {{ $vendor->name }}
                    </a>
                    @if (! $vendor->status->isRegistered())
                    <small>[ {{ $vendor->status->getLabel() }} ]</small>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection
