@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading">事業者を編集する</div>
                    <div class="panel-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $message)
                            <p>{{ $message }}</p>
                            @endforeach
                        </div>
                        @endif
                        <form
                            action="{{ route('vendors.edit', ['id' => $vendor->id]) }}"
                            method="POST"
                        >
                            @csrf
                            <div class="form-group">
                                <label for="title">事業者名</label>
                                <input type="text" class="form-control" name="vendor_name" id="vendor_name" value="{{ old('vendor_name') ?? $vendor->name }}" />
                            </div>
                            <div class="form-group">
                                <label for="status">状態</label>
                                <select name="status" id="status" class="form-control">
                                    @foreach(\App\Vendor::STATUS as $key => $val)
                                    <option
                                        value="{{ $key }}"
                                        {{ $key == old('status', $vendor->status) ? 'selected' : '' }}
                                    >
                                        {{ $val['label'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">送信</button>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
