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
            Edit part
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
                <?php /** @var App\Models\Part $part */ ?>
                <form method="post" action="{{ route('part.update', $part->id) }}">
                    <div class="form-group">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <label for="name">Part name</label>
                        <select class="form-control" name="partName">
                            <option value=""></option>
                            @foreach($partNames as $partName)
                            <option value="{{ $partName }}"  @selected($partName === $part->name)>{{ $partName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        @csrf
                        <label for="name">Manufacturer</label>
                        <select onchange="manufacturer_changed()" class="form-control" name="part_manufacturer_id" id="manufacturers">
                            @foreach($partManufacturers as $manufacturer)
                                <?php
                                /** @var \App\Models\PartManufacturer $manufacturer */
                                /** @var \App\Models\Part $part */
                                if (old('part_manufacturer_id')) {
                                    $isSelected = old('part_manufacturer_id') == $manufacturer->id;
                                } else {
                                    $isSelected = $manufacturer->id == $part->manufacturer_id;
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
                        <select class="form-control" name="part_model_id" id="models">
                            <option @selected( !old('part_model_id')) value=""></option>
                            @foreach($partModels as $model)
                                <option @selected($part->model_id === $model->id) manufacturer_id="{{$model->manufacturer_id}}" value="{{ $model->id }}">{{$model->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        @csrf
                        <label for="name">Count on storage</label>
                        <input type="text" value="{{$part->count}}" class="form-control" name="count"/>
                    </div>
                    <button type="submit" class="btn btn-block btn-danger">Edit part</button>
                </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        window.onload = function () {
            filter();
            if ({{(int) (old('part_manufacturer_id', '0') && (old('part_manufacturer_id') != $part->manufacturer_id))}}) {
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
@endsection

