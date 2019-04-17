@extends('admin.layout_2col')

@section('main')

<div class="h3">ブランド編集</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.brands.edit', ['id' => $brand->id]) }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="card mb-3">
        <div class="card-header">ブランド名</div>
        <div class="card-body">
            <input type="text" class="form-control"
                name="name" id="name"
                value="{{ old('name') ?? $brand->raw_name }}"
                {{ $brand->raw_name ? '' : 'placeholder=' . $brand->vendor->name }}
            >
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">状態</div>
        <div class="card-body">
            <select name="status" id="status" class="form-control">
                @foreach($brand->status::values() as $status)
                <option value="{{ $status->getValue() }}" {{ $status->equals($brand->status) ? 'selected' : '' }}>
                    {{ $status->getLabel() }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">ジャンル</div>
        <div class="card-body">
            @forelse ($all_genres as $genre)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"
                    name="genres[]" id="genre-{{ $genre->id }}"
                    value="{{ $genre->id }}" {{ in_array($genre->id, $genre_ids) ? 'checked' : '' }}
                >
                <label class="form-check-label" for="genre-{{ $genre->id }}">{{ $genre->name }}</label>
            </div>
            @empty
            まだジャンルは作成されていません。<a href="{{ route('admin.genres.index') }}">作成しますか？</a>
            @endforelse
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">紹介文</div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-lg-2 col-md-3">20文字以内</dt>
                <dd class="col-lg-10 col-md-9">
                    <input type="text" class="form-control"
                        name="ad_copy" id="ad_copy"
                        value="{{ old('ad_copy') ?? $brand->advertisement->title_secondary }}"
                        maxlength="20"
                    >
                </dd>
                <dt class="col-lg-2 col-md-3">40文字以内</dt>
                <dd class="col-lg-10 col-md-9">
                    <input type="text" class="form-control"
                        name="ad_text" id="ad_text"
                        value="{{ old('ad_text') ?? $brand->advertisement->description_primary }}"
                        maxlength="40"
                    >
                </dd>
                <dt class="col-lg-2 col-md-3">制限なし</dt>
                <dd class="col-lg-10 col-md-9">
                    <textarea class="form-control"
                        name="description" id="description"
                    >{{ old('description') ?? $brand->advertisement->content_primary }}</textarea>
                </dd>
            </dl>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">ブランド写真</div>
        <div class="card-body">
            <input type="file" name="image" id="image">
        </div>
    </div>

    <div class="text-right">
        <div class="btn-group">
            <a href="{{ route('admin.brands.show', ['id' => $brand->id]) }}" class="btn btn-light">キャンセル</a>
            <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </div>

</form>

@endsection

@section('sidebar')
<nav class="nav flex-column">
    <a class="nav-link" href="{{ route('admin.brands.index') }}">
        ブランド一覧に戻る
    </a>
</nav>
@endsection
