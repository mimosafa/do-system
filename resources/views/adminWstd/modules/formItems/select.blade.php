{{--

    @var ?string $label
    @var string $id
    @var string $name
    @var array $options
    @var mixed $value

--}}

@if ($label)
<label for="{{ $id }}">{{ $label }}</label>
@endif
<select name="{{ $name }}" id="{{ $id }}" class="form-control">
    @foreach($options as $lbl => $val)
    <option value="{{ $val }}" {{ $val === $value ? 'selected' : '' }}>
        {{ $lbl }}
    </option>
    @endforeach
</select>
