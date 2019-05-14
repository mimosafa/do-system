{{--
    @see Wstd\View\Admin\Pages\Vendors\ShowViewModel

    @var string $title
    @var Wstd\View\Admin\Pages\Cars\ShowDefaultInformation $defaultInformation
    @var Wstd\View\Admin\Modules\TabContents $objectsBelonged

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
                @include($objectsBelonged->template(), $objectsBelonged)
            </div>
        </div>
        @stack('hidden_form')
    </form>
@endsection

@push('js')
    <script src="{{ asset('wstd/js/do-system.js') }}"></script>
@endpush
