{{--

    @var string $title
    @var string $id

--}}

@extends('admin.templates.base')

@section('page_title', $title)

@section('content')
    @adminBox(compact('id'))
        @presenter($tableInstance)
    @endadminBox
@endsection
