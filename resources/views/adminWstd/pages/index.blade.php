{{--

    @var string $title
    @var string $id

--}}

@extends('adminWstd.base')
@section('page_title', $title)

@section('content')
    <div class="box" id="{{ $id }}_table">
        <div class="box-body">
            @include('adminWstd.includes.dataTable')
        </div>
    </div>
@endsection
