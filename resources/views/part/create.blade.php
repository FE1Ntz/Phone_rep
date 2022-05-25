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
                    <select class="form-control" name="partName">
                        <option value=""></option>
                        @foreach($partNames as $partName)
                            <option @selected($partName == old('partName')) value="{{ $partName }}">{{ $partName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="name">Manufacturer</label>
                    <select onchange="filter()" class="form-control" name="part_manufacturer_id" id="manufacturers">
                        <option value=""></option>
                        @foreach($partManufacturers as $manufacturer)
                            <option @selected($manufacturer->id == old('part_manufacturer_id')) value="{{ $manufacturer->id }}">{{$manufacturer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="last_name">Model</label>
                    <select class="form-control" name="part_model_id" id="models">
                        <option value=""></option>
                    @foreach($partModels as $model)
                            <option manufacturer_id="{{$model->manufacturer_id}}" value="{{ $model->id }}">{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="name">Count on storage</label>
                    <input type="text" class="form-control" value="" name="count"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create part</button>
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

