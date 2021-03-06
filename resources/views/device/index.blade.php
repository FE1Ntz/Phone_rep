@extends('layout')
@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div class="d-flex mt-2 mb-2">
            <div><a class="btn btn-primary mr-2" href="{{route('device.index')}}">Device</a></div>
            <div><a class="btn btn-primary mr-2" href="{{route('device-manufacturer.index')}}">Manufacturer</a></div>
            <div><a class="btn btn-primary" href="{{route('device-model.index')}}">Model</a></div>
            <div class="ml-auto"><a class="btn btn-primary" style="float: right" href="{{route('device.create')}}">Add Device</a></div>
        </div>
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>Manufacturer</td>
                <td>Model</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
                @foreach($devices as $device)
                <tr>
                    <td>{{$device->id}}</td>
                    <td>{{$device->manufacturer->name}}</td>
                    <td>{{$device->model->name}}</td>
                    <td class="text-center">
                        <a href="{{ route('device.edit', $device->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('device.destroy', $device->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            {{ $devices->links() }}
            <div>
@endsection
