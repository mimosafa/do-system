@extends('admin.layout_1col')

@section('main')
<div class="h3 float-left">事業者一覧</div>

<ol class="breadcrumb float-right ml-auto mb-0 pb-0" style="background-color:transparent;">
    <li class="breadcrumb-item">
        <a href="#">すべて</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.vendors.create') }}">新規作成</a>
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
                <th>事業者名</th>
                <th>状態</th>
                <th>ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendors as $vendor)
            <tr class="{{ $vendor->status->isActive() ? '' : 'table-secondary' }}">
                <td>
                    <a href="{{ route('admin.vendors.show', ['id' => $vendor->id]) }}">
                        {{ $vendor->name }}
                    </a>
                </td>
                <td>
                    <span class="badge badge-{{ $vendor->status_attr['class'] }}">
                        {{ $vendor->status_attr['label'] }}
                    </span>
                </td>
                <td>
                    {{ $vendor->id }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection
