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
            Add Part model
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
            <form method="post" action="{{ route('part-model.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Manufacturer</label>
                    <select class="form-control" name="manufacturer_id">
                        <option value=""></option>
                        @foreach($partManufacturers as $manufacturer)
                            <option @selected($manufacturer->id == old('manufacturer_id')) value="{{ $manufacturer->id }}">{{$manufacturer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="name">Model name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Part model</button>
            </form>
        </div>
    </div>
@endsection
