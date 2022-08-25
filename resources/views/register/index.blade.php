@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-registration">
                <form action="/register" method="post">
                    @csrf
                    <div class="text-center">
                        <a href="/">
                            <img class="mb-4" src="https://upload.wikimedia.org/wikipedia/commons/0/0f/Logo_BSSN_new.png"
                                alt="" width="100">
                        </a>
                        <h1 class="h3 mb-3 fw-normal">Register</h1>
                    </div>

                    <input type="hidden" name="is_admin" value="0">
                    <div class="form-floating">
                        <input type="text"
                            class="form-control rounded-top
                @error('name') is-invalid @enderror
                "
                            id="nama" name="name" placeholder="nama" required value="{{ old('name') }}">
                        <label for="nama">Nama</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email"
                            class="form-control
                @error('email') is-invalid @enderror
                "
                            id="floatingInput" name="email" placeholder="name@example.com" required
                            value="{{ old('email') }}">
                        <label for="floatingInput">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password"
                            class="form-control rounded-bottom
                @error('password') is-invalid @enderror
                "
                            id="floatingPassword" name="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <div class="mt-2 text-center">
                    <small><a href="/login">Login</a></small>
                </div>
            </main>
        </div>
    </div>
@endsection
