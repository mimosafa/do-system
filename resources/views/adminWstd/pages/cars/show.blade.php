{{--

    @var string $title
    @var Wstd\View\Admin\Pages\Cars\ShowDefaultInformation $defaultInformation

--}}

@extends('adminWstd.base')
@section('page_title', $title)

@section('content')
    <form method="post">
        @csrf
        <div class="row">
            <div class="col-md-3">
                @include($defaultInformation->template(), $defaultInformation)
            </div>
            <div class="col-md-9">
                <!-- -->
            </div>
        </div>
        @stack('hidden_form')
    </form>
@endsection
