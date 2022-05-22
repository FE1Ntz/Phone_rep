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
            Add part
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
            <form method="post" action="{{ route('part.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Part name</label>
                    <select class="form-control" name="name">
                        <option value="">...</option>
                        <option value="CPU">CPU</option>
                        <option value="GPU">GPU</option>
                        <option value="Motherboard">Motherboard</option>
                        <option value="RAM">RAM</option>
                        <option value="Battery">Battery</option>
                        <option value="Camera">Camera</option>
                        <option value="HDD">HDD</option>
                        <option value="Buttons">Buttons</option>
                        <option value="Fingerprint sensor">Fingerprint sensor</option>
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="name">Manufacturer</label>
                    <select class="form-control" name="device_manufacturer_id">
                        @foreach($partManufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}">{{$manufacturer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="last_name">Model</label>
                    <select class="form-control" name="device_model_id">
                        @foreach($partModels as $model)
                            <option value="{{ $model->id }}">{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="name">Count on storage</label>
                    <input type="text" class="form-control" name="count"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create part</button>
            </form>
        </div>
    </div>
@endsection

