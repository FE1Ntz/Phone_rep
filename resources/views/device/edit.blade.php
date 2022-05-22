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
            Edit device
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
{{--
            <?php dd(old('device_manufacturer_id')); ?>
--}}
            <form method="post" action="{{ route('device.update', $device->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="name">Manufacturer</label>
                    <select onchange="manufacturer_changed()" class="form-control" name="device_manufacturer_id" id="manufacturers">
                        @foreach($deviceManufacturers as $manufacturer)
                            <?php
                                /** @var \App\Models\DeviceManufacturer $manufacturer */
                                /** @var \App\Models\Device $device */
                                if (old('device_manufacturer_id')) {
                                    $isSelected = old('device_manufacturer_id') == $manufacturer->id;
                                } else {
                                    $isSelected = $manufacturer->id == $device->manufacturer_id;
                                }
                            ?>
                            <option @selected($isSelected) value="{{ $manufacturer->id }}">
                                {{$manufacturer->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="last_name">Model</label>
                    <select class="form-control" name="device_model_id" id="models">
                        <option @selected( !old('device_model_id')) value=""></option>
                        @foreach($deviceModels as $model)
                            <option @selected($device->model_id === $model->id) manufacturer_id="{{$model->manufacturer_id}}" value="{{ $model->id }}">{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Edit device</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        window.onload = function () {
            filter();
            if ({{(int) (old('device_manufacturer_id', '0') && (old('device_manufacturer_id') != $device->manufacturer_id))}}) {
                $("#models").val([]);
            }

        }

        function filter() {
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
            console.log('filter');
        }

        function manufacturer_changed () {
            filter();
            $("#models").val([]);
            console.log('manufacturer changed');
        }
    </script>


