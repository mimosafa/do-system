@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <!-- 何か -->
            </div>
            <div class="column col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $vendor->name }}
                    </div>
                    <div class="panel-body">
                        <div class="text-right">
                            <a href="#" class="btn btn-default btn-block">
                                事業者を編集する
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
