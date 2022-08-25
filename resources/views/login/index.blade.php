@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin">
                <form action="/login" method="post">
                    @csrf
                    <div class="text-center">
                        <a href="/">
                            <img class="mb-4" src="https://upload.wikimedia.org/wikipedia/commons/0/0f/Logo_BSSN_new.png"
                                alt="" width="100">
                        </a>
                        <h1 class="h3 mb-3 fw-normal">Login</h1>
                    </div>

                    <div class="form-floating">
                        <input type="email"
                            class="form-control
                @error('email') is-invalid @enderror
                "
                            id="email" name="email" placeholder="name@example.com" required
                            value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required>
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <div class="mt-2 text-center">
                    <small><a href="/register">Register Account</a></small>
                </div>
            </main>
        </div>
    </div>
@endsection
