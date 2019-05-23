{{--

    @see resources/views/adminWstd/includes/dataTable.blade.php

    @var string $name
    @var Wstd\View\Admin\Contents\FormItemContainer $addShopForm

--}}

@extends('adminWstd.includes.dataTable')

@php
    $editModalId = 'add_shop_to_vendor';
@endphp

@section('after_' . $name . '_table')
<a href="#" data-toggle="modal" data-target="#{{ $editModalId }}" class="btn btn-primary btn-block btn-sm">
    <b>店舗を追加する</b>
</a>
@endsection

@push('hidden_form')
    @component('adminWstd.modules.modal', [
        'id' => $editModalId,
        'title' => '店舗を追加',
        'submittable' => true,
    ])
    @include($addShopForm->template(), $addShopForm)
    <input type="hidden" name="{{ $editModalId }}" value="1">
    @endcomponent
@endpush
