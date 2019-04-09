@extends('admin.layout')

@section('main')
<div class="h3">事業者一覧</div>

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

@section('sidebar')
<a href="{{ route('admin.vendors.create') }}">
    事業者を作成する
</a>
@endsection
