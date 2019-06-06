@extends('adminlte::page')

@section('title')
    @yield('page_title')
@endsection

@section('content_header')
    @includeWhen($errors->any(), 'admin.includes.alertError')
    <h1>
        @yield('page_title')
        @yield('post_page_title')
    </h1>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ mix('/wstd/css/admin.css') }}">
@endpush

@push('js')
    <script src="{{ asset('wstd/js/do-system.js') }}"></script>
    <script src="{{ mix('/wstd/js/admin.js') }}"></script>
@endpush
