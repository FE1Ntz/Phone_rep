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
                    <select onchange="filter()" class="form-control" name="device_manufacturer_id" id="manufacturers">
                        <option value="">...</option>
                        @foreach($deviceManufacturers as $manufacturer)
                            <option @selected($manufacturer->id == old('device_manufacturer_id')) value="{{ $manufacturer->id }}">{{$manufacturer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="last_name">Model</label>
                    <select class="form-control" name="device_model_id" id="models">
                        @foreach($deviceModels as $model)
                            <option manufacturer_id="{{$model->manufacturer_id}}" value="{{ $model->id }}">{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create device</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        filter();
        function filter() {
            $("#models").val([]);
            var manufacturer = document.getElementById("manufacturers").value;
            var models = document.getElementById("models");
            console.log(models.options[0]);
            for (var i = 0; i < models.length; i++) {
                var id = models.options[i].getAttribute("manufacturer_id");
                console.log(id);
                console.log(manufacturer);
                if (id !== manufacturer) {
                    models.options[i].style.display = 'none';
                } else {
                    models.options[i].style.display = 'list-item';
                }
            }
        }
    </script>
@endsection

