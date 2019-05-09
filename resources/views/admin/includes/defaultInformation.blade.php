{{--

    @see Wstd\View\Models\Admin\Includes\AbstractDefaultInformation

    @var string $nameOfEntity
    @var string $headerCallback
    @var array $items
    @var array $itemLabels
    @var callable $strCamel
    @var callable ${camelCaseItem}Callback
    @var bool $isEditable
    @var array $editableItems

--}}
@php
    $modalId = 'edit-' . $nameOfEntity . '-default-information';
@endphp

<div class="box">
    <div class="box-body">
        @if ($headerCallback)
        <h3 class="text-center">
            {!! $headerCallback !!}
        </h3>
        @endif
        <table class="table">
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <th>
                        {!! $itemLabels[$item] !!}
                    </th>
                    <td class="text-right">
                        {!! ${$strCamel($item) . 'Callback'} !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if ($isEditable)
        <a href="#" data-toggle="modal" data-target="#{{ $modalId }}"
            class="btn btn-primary btn-block btn-sm">
            <b>編集する</b>
        </a>
        @endif
    </div>
</div>

@if ($isEditable)

@push('hiddenForm')
    @component('admin.components.modal', [
        'id' => $modalId,
        'title' => '基本情報を編集',
        'submittable' => true,
    ])

    @php
        $editNow = [];
    @endphp

    @foreach ($editableItems as $editableItem)
        @php
            $form = ${$strCamel($editableItem) . 'FormCallback'};
            $editNow[] = $editableItem;
        @endphp
        @include('admin.components.forms.' . $form->template, $form)
    @endforeach

    @foreach ($editNow as $editItem)
        <input class="{{ $modalId }}-hidden" type="hidden"
            name="edit-{{ $editItem }}-now" id="edit-{{ $editItem }}-now"
            value="1" disabled="disabled"
        >
    @endforeach

    @endcomponent
@endpush

@push('js')
    <script>
        var $editNow = $('.{{ $modalId }}-hidden');
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
