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
        <div class="d-flex flex-start">
            <a class="btn btn-primary mr-2" href="{{route('device.index')}}">Device</a>
            <a class="btn btn-primary mr-2" href="{{route('device-manufacturer.index')}}">Manufacturer</a>
            <a class="btn btn-primary" href="{{route('device-model.index')}}">Model</a>
        </div>
        <div class="mt-2 mb-2" style="display: flex; justify-content: flex-end;">
            <a class="btn btn-primary" href="{{route('device-manufacturer.create')}}">Add Manufacturer</a>
        </div>
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>Manufacturer</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($deviceManufacturers as $manufacturer)
            <tr>
                <td>{{$manufacturer->id}}</td>
                <td>{{$manufacturer->name}}</td>
                <td class="text-center">
                    <a href="{{ route('device-manufacturer.edit', $manufacturer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{route('device-manufacturer.destroy', $manufacturer->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection

