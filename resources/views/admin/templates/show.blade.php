{{--

    @see Wstd\View\Models\Admin\AbstractShowViewModel

    @var string $labelOfEntity
    @var bool $isEditable
    @var Wstd\View\Models\Admin\Includes\DefaultInformation $defaultInformation

--}}

@extends('admin.base')

@section('title', $labelOfEntity . '詳細')

@section('content_header')
    @includeWhen($errors->any(), 'admin.components.alertError')
    <h1>{{ $labelOfEntity }}詳細</h1>
@endsection

@section('content')
    @if ($isEditable)
    <form action="" method="post">
        @csrf
    @endif

    <div class="row">
        <div class="col-md-3">
            @includeWhen(
                $defaultInformation,
                'admin.includes.defaultInformation',
                $defaultInformation
            )
        </div>
        <div class="col-md-9">
            @includeWhen(
                $belongsInformation,
                'admin.includes.belongsInformation',
                $belongsInformation
            )
        </div>
    </div>

    @if ($isEditable)
        @stack('hiddenForm')
    </form>
    @endif
@endsection
