@extends('layout')
@section('content')
    <style>
        .container {
            max-width: 450px;
        }
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="card push-top">
        <div class="card-header">
            Add Device
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('device.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Manufacturer</label>
                    <select class="form-control" name="device_manufacturer_id">
                        @foreach($deviceManufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}">{{$manufacturer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="last_name">Model</label>
                    <select class="form-control" name="device_model_id">
                        @foreach($deviceModels as $model)
                            <option value="{{ $model->id }}">{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create device</button>
            </form>
        </div>
    </div>
@endsection

