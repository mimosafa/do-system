@extends('adminlte::page')

@section('title')
    @yield('page_title')
@endsection

@section('content_header')
    @includeWhen($errors->any(), 'adminWstd.includes.alertError')
    <h1>
        @yield('page_title')
        @yield('post_page_title')
    </h1>
@endsection
