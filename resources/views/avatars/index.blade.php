@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Choose Your Avatar</h2>

        <div class="avatars">
            @foreach ($avatars as $avatar)
                <div class="avatar-item">
                    <img src="{{ asset('storage/' . $avatar->image) }}" alt="{{ $avatar->name }}">
                    <p>{{ $avatar->name }} - {{ $avatar->price }} coins</p>
                    <form action="{{ route('avatars.buy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                        <button type="submit" class="btn btn-primary">Buy</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
