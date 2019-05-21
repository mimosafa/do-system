{{--

    @var string $title
    @var Wstd\View\Admin\Pages\Cars\ShowDefaultInformation $defaultInformation

--}}

@extends('adminWstd.base')
@section('page_title', $title)

@section('content')
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3">
                @include($defaultInformation->template(), $defaultInformation)
            </div>
            <div class="col-md-9">

                @component('adminWstd.modules.contentBox', [
                    'title' => '画像',
                ])
                @include('adminWstd.includes.gallery')
                @endcomponent

            </div>
        </div>
        @stack('hidden_form')

    </form>
@endsection
