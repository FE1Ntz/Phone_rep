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
        <div class="mt-2 mb-2" style="display: flex; justify-content: flex-end;">
            <a class="btn btn-primary" href="{{ route('order.create') }}">Add Order</a>
        </div>
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>First name</td>
                <td>Last name</td>
                <td>Device</td>
                <td>Status</td>
                <td>Price</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->client->first_name}}</td>
                    <td>{{$order->client->last_name}}</td>
                    <td>{{$order->device->manufacturer->name." ".$order->device->model->name}} </td>
                    <td>{{$order->is_done ? "Done" : "In progress"}}</td>
                    <td>{{$order->price}}</td>
                    <td class="text-center">
                        <a href="{{route('order.edit', $order->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection

