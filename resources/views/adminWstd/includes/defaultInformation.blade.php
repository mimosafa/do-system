{{--

    @see Wstd\View\Admin\Includes\AbstractDefaultInformation

    @var string $name
    @var string $header
    @var array $items
    @var array $itemLabels
    @var callable $strCamel(string): string
    @var string ${itemCamelCase}Content
    @var ?Wstd\ViewAdmin\Includes\FormItemContainer $formItemContainer

--}}

@php
    $editModalId = 'edit_' . $name . '_default_information';
@endphp

<div class="box" id="">
    <div class="box-body">
        @if ($header)
        <h3 class="text-center">{!! $header !!}</h3>
        @endif
        <table class="table">
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <th scope="row">{{ $itemLabels[$item] ?? $strTitle($item) }}</th>
                    <td class="text-right">
                        @php
                            $callbackName = $strCamel($item) . 'Content';
                        @endphp
                        {!! isset(${$callbackName}) ? ${$callbackName} : $content($item) !!}
                    </td>
                @endforeach
            </tbody>
        </table>
        <a href="#" data-toggle="modal" data-target="#{{ $editModalId }}" class="btn btn-primary btn-block btn-sm">
            <b>編集する</b>
        </a>
    </div><!-- /.box-body -->
</div><!-- /.box -->

@isset($formItemContainer)
    @push('hidden_form')
        @component('adminWstd.modules.modal', [
            'id' => $editModalId,
            'title' => '基本情報を編集',
            'submittable' => true,
        ])
        @include($formItemContainer->template(), $formItemContainer)
        <input type="hidden" name="{{ $editModalId }}" value="1">
        @endcomponent
    @endpush
@endisset
