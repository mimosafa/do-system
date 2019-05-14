{{--

    @var string $label
    @var string $id
    @var string $name
    @var string $value

--}}

@if ($label)
<label for="{{ $id }}">{{ $label }}</label>
@endif
<input type="text"
    class="form-control"
    name="{{ $name }}" id="{{ $id }}" value="{{ old($name) ?? $value }}"
>
