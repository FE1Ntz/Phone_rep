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
            Edit model
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
            <form method="post" action="{{ route('device-model.update', $model->id) }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Manufacturer</label>
                    <select class="form-control" name="manufacturer_id">
                        @foreach($deviceManufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}"  @selected($manufacturer->id === $model->manufacturer_id)>{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Model</label>
                    <input type="text" class="form-control" name="name" value="{{ $model->name }}"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Edit model</button>
            </form>
        </div>
    </div>
@endsection

