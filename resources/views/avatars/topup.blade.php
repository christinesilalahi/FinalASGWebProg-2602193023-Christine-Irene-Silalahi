@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Top Up Coins</h2>

        <form action="{{ route('topup.submit') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Top Up 100 Coins</button>
        </form>

        <p>Your current balance: {{ auth()->user()->coins }} coins</p>
    </div>
@endsection
