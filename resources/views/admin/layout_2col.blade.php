@extends('admin.common')

@section('content')
<div class="row">
    <div class="col-md-8 order-md-last">
        @yield('main')
    </div>
    <div class="col-md-4 order-md-first">
        @yield('sidebar')
    </div>
</div>
@endsection
