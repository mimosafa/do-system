{{--

    @var string $title
    @todo Form attributes.

--}}

@extends('admin.templates.base')

@section('page_title', $title)

@section('content')
    <form method="post">
        @csrf

        {{ $slot }}

        @stack('hidden_form')
    </form>
@endsection
