{{--

    @var string $id
    @var string $title

    @var string $beforeIndex
    @var bool $hasCollection
    @var Illuminate\Support\Collection $collection
    @var array[string] $items
    @var callable $thAttributes(string): string
    @var callable $th(string): string
    @var callable $trAttributes(Wstd\Domain\Models\EntityInterface): string
    @var callable $tdAttribute(string, Wstd\Domain\Models\EntityInterface): string
    @var callable|bool $getTdMethod(string) callable: string
    @var string $emptyMessage
    @var string $afterIndex

--}}

@extends('admin.templates.base')

@section('page_title', $title)

@section('content')
    <div class="box" id="{{ $id }}_box">
        <div class="box-body">
            @include('admin.modules.table')
        </div>
    </div>
@endsection
