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
            Add Client
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
            <form method="post" action="{{ route('client.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">First name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" name="last_name"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" name="phone" pattern="^[\+][0-9]{3}[0-9]{3}[0-9]{5}$" required/>
                    <small>Format: +12345678901</small>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Client</button>
            </form>
        </div>
    </div>
@endsection
