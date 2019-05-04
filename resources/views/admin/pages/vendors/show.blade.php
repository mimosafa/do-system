@extends('admin.base')

@section('title', '事業者詳細')

@section('content_header')
    <h1>事業者詳細</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box">
                <div class="box-body">
                    <h3 class="text-center">
                        <small class="muted">事業者名</small>
                        <br>
                        {{ $model->getName() }}
                    </h3>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $model->getId() }}</td>
                            </tr>
                            <tr>
                                <th>状態</th>
                                <td>{{ $model->getStatus()->getLabel() }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @if ($model->isEditable())
                    <a href="#" data-toggle="modal" data-target="#edit-vendor"
                        class="btn btn-primary btn-block btn-sm">
                        <b>編集する</b>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
