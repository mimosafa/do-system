{{--

--}}

@component('admin.templates.show', ['title' => '新規事業者作成',])

    @adminBox(['title' => '事業者名',])

    <div class="input-group">
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">作成</button>
        </span>
    </div>

    @endadminBox

@endcomponent
