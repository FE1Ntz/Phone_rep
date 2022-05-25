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
            Edit Order
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
            <form method="POST" action="{{ route('order.update', $order->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="name">Phone number</label>
                    <select class="form-control" name="client_id">
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->phone_number }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Device</label>
                    <select class="form-control" name="device_id" id="devices">
                        @foreach($devices as $device)
                            <option value="{{ $device->id }}">{{ $device->manufacturer->name }} {{ $device->model->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">Price</label>
                    <input type="number" min="0" step=".01" class="form-control" name="price" value="{{ $order->price }}"/>
                </div>
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" name="is_done" @checked($order->is_done == true) value="{{ true }}">
                    <label class="form-check-label" for="status">Is Done</label>
                </div>
                <div class="form-group">
                    <label for="parts">Parts</label>
                    <select class="form-control" name="parts[]" id="parts" multiple>
                        @foreach($parts as $part)
                            <option @selected($order->isContainPart($part)) value="{{ $part->id }}">{{$part->name}} - {{ $part->manufacturer->name }} {{ $part->model->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Edit Order</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#parts').select2();
        });
    </script>
@endsection
