@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Wishlist</h2>

        <div class="wishlist">
            @foreach ($wishlists as $wishlist)
                <div class="wishlist-item">
                    <img src="{{ asset('storage/' . $wishlist->user->profile_picture) }}" alt="{{ $wishlist->user->name }}" class="user-image">
                    <h5>{{ $wishlist->user->name }}</h5>
                    <p>{{ implode(', ', json_decode($wishlist->user->field_of_work)) }}</p>
                    
                    <form action="{{ route('wishlist.respond') }}" method="POST">
                        @csrf
                        <input type="hidden" name="wished_user_id" value="{{ $wishlist->user->id }}">
                        <button type="submit" class="btn btn-warning">Respond</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
