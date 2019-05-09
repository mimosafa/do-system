{{--

    @todo 結構ハードコーディングなので、必ずリファクタリングする

    @see resouses/views/admin/components/dataTable.blade.php

    @see Wstd\View\Models\Admin\Pages\Vendor\CarDataTable
    @var string $modalId

--}}

@extends('admin.components.dataTable')

@if ($isEditable)

    @push('hiddenForm')
        @component('admin.components.modal', [
            'id' => $modalId,
            'title' => '車両を追加',
            'modalSize' => 'large',
            'submitText' => '追加',
            'submittable' => true,
        ])

            @include('admin.components.forms.inputText', [
                'label' => '車両名',
                'name'  => 'car[name]',
                'value' => '',
            ])

            @include('admin.components.forms.inputText', [
                'label' => '車両No',
                'name'  => 'car[vin]',
                'value' => '',
            ])

            <input type="hidden" value="1" disabled="disabled"
                name="addCarToVendorNow" id="addCarToVendorNow"
            >

        @endcomponent
    @endpush

    @push('js')
        <script>
            var $editNow = $('#addCarToVendorNow');
            $('#{{ $modalId }}')
                .on('show.bs.modal', function (e) {
                    $editNow.removeAttr('disabled');
                })
                .on('hide.bs.modal', function (e) {
                    $editNow.attr('disabled', 'disabled');
                })
            ;
        </script>
    @endpush

@endif
