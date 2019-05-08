{{--

    @var string $label
    @var string $name
    @var string $value

--}}

<div class="form-group">
    @if ($label)
    <label for="name">{{ $label }}</label>
    @endif
    <input type="text" class="form-control"
        name="{{ $name }}" id="{{ $name }}"
        value="{{ old($name) ?? $value }}"
    >
</div>
