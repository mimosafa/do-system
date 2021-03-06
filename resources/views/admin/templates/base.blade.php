@extends('adminlte::page')

@section('title')
    @yield('page_title')
@endsection

@section('content_header')
    @includeWhen($errors->any(), 'admin.includes.alertError')
    <h1>
        @yield('page_title')
        @isset($titleAddon)
            {{ $titleAddon }}
        @endisset
    </h1>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ mix('/wstd/css/admin.css') }}">
@endpush

@push('js')
    <script src="{{ mix('/wstd/js/manifest.js') }}"></script>
    <script src="{{ mix('/wstd/js/vendor.js') }}"></script>
    <script src="{{ mix('/wstd/js/admin.js') }}"></script>
@endpush
