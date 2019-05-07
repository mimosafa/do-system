{{--

    @see Wstd\Equipment\View\Models\Admin\AbstractIndexViewModel

    @var string $labelOfIndexed
    @var Wstd\Domain\Models\AbstractCollection $list

 --}}
@extends('admin.base')

@section('title', $labelOfIndexed . '一覧')

@section('content_header')
    <h1>{{ $labelOfIndexed }}一覧</h1>
@endsection

@section('content')
    <div class="box">
        @if ($list->isEmpty())
        <div class="box-body">
            {{ $labelOfIndexed }}の登録はありません。
        </div>
        @else
        <div class="box-body">
            @include('admin.includes.indexTable')
        </div>
        @endif
    </div>
@endsection
