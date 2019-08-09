{{--

    @var string $title

--}}

@extends('admin.templates.base')

@section('page_title', $title)

@section('content')
    <div class="row">
        <div class="col-md-9">
            @adminBox([
                'boxContext' => 'primary',
            ])
                @presenter($tableInstance)
            @endadminBox
        </div>
        <div class="col-md-3">
            @adminBox([
                'title' => '都道府県',
                'boxContext' => 'primary',
                'id' => 'prefectures_link',
            ])
                @foreach ($prefectures as $prefecture)

                <a
                    href="?prefecture_id={{ $prefecture->getId() }}"
                    style="padding:.5em; white-space: nowrap; display: inline-block;"
                >
                    {{ $prefecture }}
                </a>

                @endforeach
            @endadminBox
        </div>
    </div>

    <form method="post">
        @csrf
        @stack('hidden_form')
    </form>
@endsection
