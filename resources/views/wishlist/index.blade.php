@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Wishlist</h2>

        <div class="wishlist">
            @foreach ($wishlists as $wishlist)
                <div class="wishlist-item">
                    <img src="{{ asset('storage/' . $wishlist->user->profile_picture) }}" alt="{{ $wishlist->user->name }}" class="user-image">
                    <h5>{{ $wishlist->user->name }}</h5>

                    @php
                        $fieldOfWork = json_decode($wishlist->user->field_of_work);
                    @endphp
                    <p>
                        @if (is_array($fieldOfWork))
                            {{ implode(', ', $fieldOfWork) }}
                        @else
                            {{ $wishlist->user->field_of_work }}
                        @endif
                    </p>
                    
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
