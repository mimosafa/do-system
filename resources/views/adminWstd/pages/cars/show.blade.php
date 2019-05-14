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
                画像がここに入ります。
                <a href="#" data-toggle="modal" data-target="#add_image_to_car" class="btn btn-primary btn-sm">
                    <b>追加</b>
                </a>
                @endcomponent
                
            </div>
        </div>
        @stack('hidden_form')

        @component('adminWstd.modules.modal', [
            'id' => 'add_image_to_car',
            'title' => '画像を追加する',
            'submittable' => true,
        ])
        <input type="file" name="image">
        <input type="hidden" name="add_image_to_car" value="1">
        @endcomponent

    </form>
@endsection
