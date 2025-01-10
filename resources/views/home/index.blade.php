@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Welcome, {{ auth()->user()->name }}</h2>
        
        <div class="filter-section">
            <form action="{{ route('filter') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-3">
                    <label for="gender" class="form-label">Filter by Gender</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>

            <form action="{{ route('search') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-3">
                    <label for="field_of_work" class="form-label">Search by Field of Work</label>
                    <input type="text" class="form-control" id="field_of_work" name="field_of_work" required>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <div class="row">
        @foreach ($users as $user)
            <div class="col-md-4 mb-4"> <!-- Create 3 columns, responsive on medium screens -->
                <div class="card">
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ is_array(json_decode($user->field_of_work)) ? implode(', ', json_decode($user->field_of_work)) : $user->field_of_work }}</p>
                        
                        @if(auth()->check())
                            <form action="{{ route('wishlist.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="wished_user_id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-success">Thumb</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Login to Interact</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pagination">
    {{ $users->links() }}
    </div>
@endsection
