@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Choose Your Avatar</h2>

        <div class="row">
            @foreach ($avatars as $avatar)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $avatar->image) }}" alt="{{ $avatar->name }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $avatar->name }}</h5>
                            <p class="card-text">{{ $avatar->price }} coins</p>
                            <form action="{{ route('avatars.buy') }}" method="POST">
                                @csrf
                                <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                                <button type="submit" class="btn btn-primary w-100">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="pagination">
    {{ $avatars->links() }}
    </div>
@endsection
