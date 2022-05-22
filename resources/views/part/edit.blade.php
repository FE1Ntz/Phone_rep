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
                        <select class="form-control" name="name">
                            @foreach($partNames as $partName)
                            <option value="{{ $partName }}"  @selected($partName === $part->name)>{{ $partName }}</option>
                            @endforeach
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
                        <input type="text" value="{{$part->count}}" class="form-control" name="count"/>
                    </div>
                    <button type="submit" class="btn btn-block btn-danger">Edit part</button>
                </form>
        </div>
    </div>
@endsection

