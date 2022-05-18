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
            Add Model
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
            <form method="post" action="{{ route('device-model.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Model name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Model</button>
            </form>
        </div>
    </div>
@endsection
