{{--

    @see Wstd\View\Models\Admin\Includes\AbstractDefaultInformation

    @var string $nameOfEntity
    @var string $headerCallback
    @var array $items
    @var array $itemLabels
    @var callable $strCamelCase
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
                        {!! ${$strCamelCase($item) . 'Callback'} !!}
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
@push('hidden')
    @component('admin.components.modal', [
        'id' => $modalId,
        'title' => '基本情報を編集',
        'submittable' => true,
    ])

    @foreach ($editableItems as $editableItem)
        @php
            $form = ${$strCamelCase($editableItem) . 'FormCallback'};
        @endphp
        @include('admin.components.forms.' . $form->template, $form)
    @endforeach

    @endcomponent
@endpush
@endif
