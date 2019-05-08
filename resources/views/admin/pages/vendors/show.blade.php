{{--

    @see Wstd\View\Models\Admin\Pages\Vendors\ShowViewModel

    @var string $labelOfEntity
    @var bool $isEditable
    @var Wstd\View\Models\Admin\Pages\Vendors\DefaultInformation $defaultInformation

--}}

@extends('admin.base')

@section('title', $labelOfEntity . '詳細')

@section('content_header')
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
    </div>

    @if ($isEditable)
    </form>
    @endif
@endsection
