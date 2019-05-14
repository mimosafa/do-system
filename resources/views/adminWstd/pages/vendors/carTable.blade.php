{{--

    @see resources/views/adminWstd/includes/dataTable.blade.php

    @var string $name
    @var Wstd\View\Admin\Contents\FormItemContainer $addCarForm

--}}

@extends('adminWstd.includes.dataTable')

@php
    $editModalId = 'add_car_to_vendor';
@endphp

@section('afterTable')
<a href="#" data-toggle="modal" data-target="#{{ $editModalId }}" class="btn btn-primary btn-block btn-sm">
    <b>車両を追加する</b>
</a>
@endsection

@push('hidden_form')
    @component('adminWstd.modules.modal', [
        'id' => $editModalId,
        'title' => '車両を追加',
        'submittable' => true,
    ])
    @include($addCarForm->template(), $addCarForm)
    <input type="hidden" name="{{ $editModalId }}" value="1">
    @endcomponent
@endpush
