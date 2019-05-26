{{--

    @var string $title
    @var string $id
    @var string $header
    @var array $properties
    @var callable $propertyLabel(string): string
    @var callable $propertyValue(string): string

--}}

@extends('admin.templates.base')

@section('page_title', $title)

@section('content')
    <form method="post">
        @csrf
        <div class="row">
            <div class="col-md-3">
                @presenter($propertiesInstance)
            </div>
            <div class="col-md-9">
                {{-- @include($objectsBelonged->template(), $objectsBelonged) --}}
            </div>
        </div>
        @stack('hidden_form')
    </form>
@endsection
