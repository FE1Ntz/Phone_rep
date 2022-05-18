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
            Edit manufacturer
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
            <form method="post" action="{{ route('device-manufacturer.update', $manufacturer->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Manufacturer</label>
                    <input type="text" class="form-control" name="name" value="{{ $manufacturer->name }}"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Edit manufacturer</button>
            </form>
        </div>
    </div>
@endsection


