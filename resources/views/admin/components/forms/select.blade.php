{{--

    @var ?string $label
    @var string $name
    @var array $options
    @var callable $optionGetValue
    @var callable $optionIsSelected
    @var callable $optionGetLabel

--}}

<div class="form-group">
    @if ($label)
    <label for="status">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" id="{{ $name }}" class="form-control">
        @foreach($options as $option)
        <option
            value="{{ $optionGetValue($option) }}"
            {{ $optionIsSelected($option) ? 'selected' : '' }}
        >
            {{ $optionGetLabel ? $optionGetLabel($option) : $optionGetValue($option) }}
        </option>
        @endforeach
    </select>
</div>
