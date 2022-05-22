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
            <form method="post" action="{{ route('part-model.update', $part_model->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Model</label>
                    <input type="text" class="form-control" name="name" value="{{ $part_model->name }}"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Edit model</button>
            </form>
        </div>
    </div>
@endsection

