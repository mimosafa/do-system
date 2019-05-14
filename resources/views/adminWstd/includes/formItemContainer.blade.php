{{--

    @var array[Wstd\View\Admin\Includes\FormItems\FormItemInterface] $items

--}}

@foreach ($items as $item)
    <div class="form-group">
        @include($item->template(), $item)
    </div>
@endforeach
