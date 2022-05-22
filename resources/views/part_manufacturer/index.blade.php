@extends('layout')
@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success" id="alert-message">
                {{ session()->get('success') }}
                <script>
                    function hide (){
                        document.getElementById('alert-message').style.visibility="hidden";
                    }
                    setTimeout(2000, hide);
                </script>
            </div><br />
        @endif
        <div class="d-flex mt-2 mb-2">
            <a class="btn btn-primary mr-2" href="{{ route('part.index') }}">Part</a>
            <a class="btn btn-primary mr-2" href="{{ route('part-manufacturer.index') }}">Manufacturer</a>
            <a class="btn btn-primary" href="{{ route('part-model.index') }}">Model</a>
            <a class="btn btn-primary ml-auto" href="{{ route('part-manufacturer.create') }}">Add manufacturer</a>
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
            @foreach($part_manufacturers as $manufacturer)
                <tr>
                    <td>{{$manufacturer->id}}</td>
                    <td>{{$manufacturer->name}}</td>
                    <td class="text-center">
                        <a href="{{ route('part-manufacturer.edit', $manufacturer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{route('part-manufacturer.destroy', $manufacturer->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            {{ $part_manufacturers->links() }}
        <div>
@endsection

