@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Settings</h2>

        <form action="{{ route('settings.hide') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Hide From Home List (50 coins)</button>
        </form>

        <form action="{{ route('settings.show') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-success">Show in Home List (5 coins)</button>
        </form>
    </div>
@endsection
