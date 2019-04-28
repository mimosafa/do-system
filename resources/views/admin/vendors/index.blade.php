@extends('admin.base')

@section('title', $model_label . '一覧')

@section('content_header')
    <h1>{{ $model_label }}一覧</h1>
@endsection

@section('content')
    <div class="box">
        @if ($list->isEmpty())
        <div class="box-body">
            {{ $model_label }}の登録はありません。
        </div>
        @else
        <div class="box-body">
            <table class="table dataTable" id="{{ $model_name }}-table" data-page-length='100'>
                <thead>
                    <tr>
                        <th style="width: 50px;">ID</th>
                        <th>事業者名</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $var)
                    <tr class="table-status-{{ $var->getStatus()->getSlug() }}">
                        <td style="color: #ccc;">
                            {{ $var->getId() }}
                        </td>
                        <td>
                            <a href="#{{-- route('admin.vendors.show', ['id' => $var->id]) --}}">
                                {{ $var->getName() }}
                            </a>
                            @if (! $var->getStatus()->isRegistered())
                            <small>[ {{ $var->getStatus()->getLabel() }} ]</small>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
@endsection

@section('js')
    @if ($datatable)
    <script>
        $('#{{ $model_name }}-table').DataTable();
    </script>
    @endif
@endsection
