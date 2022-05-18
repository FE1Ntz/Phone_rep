@extends('layout')
@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="push-top">
            <div class="mt-2 mb-2" style="display: flex; justify-content: flex-end;">
                <a class="btn btn-primary" href="{{ route('client.create') }}">Add Client</a>
            </div>
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>First name</td>
                <td>Last name</td>
                <td>Email</td>
                <td>Phone</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->first_name}}</td>
                    <td>{{$client->last_name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->phone_number}}</td>
                    <td class="text-center">
                        <a href="{{ route('client.edit', $client->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('client.destroy', $client->id)}}" method="post" style="display: inline-block">
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
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
    @endif
@endsection
