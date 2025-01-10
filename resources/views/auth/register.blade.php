@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Register</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            
            <!-- Gender -->
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            
            <!-- Field of Work -->
            <div class="mb-3">
                <label class="form-label">Field of Work</label><br>
                <input type="checkbox" id="technology" name="field_of_work[]" value="Technology">
                <label for="technology">Technology</label><br>
                
                <input type="checkbox" id="marketing" name="field_of_work[]" value="Marketing">
                <label for="marketing">Marketing</label><br>
                
                <input type="checkbox" id="sales" name="field_of_work[]" value="Sales">
                <label for="sales">Sales</label><br>
                
                <input type="checkbox" id="finance" name="field_of_work[]" value="Finance">
                <label for="finance">Finance</label><br>
                
                <input type="checkbox" id="healthcare" name="field_of_work[]" value="Healthcare">
                <label for="healthcare">Healthcare</label><br>
            </div>
            
            <!-- LinkedIn -->
            <div class="mb-3">
                <label for="linkedin_username" class="form-label">LinkedIn Username</label>
                <input type="text" class="form-control" id="linkedin_username" name="linkedin_username">
            </div>

            <!-- Mobile Number -->
            <div class="mb-3">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
            </div>
            
            <!-- Country -->
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>

            <!-- Display Registration Price -->
            <div class="mb-3">
                <label class="form-label">Registration Price</label>
                <input type="text" class="form-control" value="Rp. {{ rand(100000, 125000) }}" disabled>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
