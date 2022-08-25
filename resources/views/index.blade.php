@extends('layouts.main')
@section('content')
    <h1 class="text-center mt-5 mt-lg-5 mb-3 text-light">Welcome to Yogyakarta Cryptography Museum</h1>
    <form action="/" method="post">
        @csrf
        <div class="row justify-content-center mt-0 mt-lg-5">
            <div class="col-lg-6">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="form-floating mb-2">
                    <input type="text"
                        class="form-control
                @error('name') is-invalid @enderror
                "
                        id="name" name="name" placeholder="name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="text"
                        class="form-control
                @error('address') is-invalid @enderror
                "
                        id="address" name="address" placeholder="address" required value="{{ old('address') }}">
                    <label for="address">Address</label>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="text"
                        class="form-control
                @error('institution') is-invalid @enderror
                "
                        id="institution" name="institution" placeholder="institution" required
                        value="{{ old('institution') }}">
                    <label for="institution">Institute</label>
                    @error('institution')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-2">
                            <select class="form-select" name="type" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option value="Umum" selected>General</option>
                                <option value="TK">Kindergarten</option>
                                <option value="SD">Elementary School</option>
                                <option value="SMP">Junior High School</option>
                                <option value="SMA">Senior High School</option>
                                <option value="Mahasiswa">College Student</option>
                            </select>
                            <label for="floatingSelect">Category</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-2">
                            <input type="number"
                                class="form-control
                      @error('total_visitors') is-invalid @enderror
                      "
                                id="total_visitors" name="total_visitors" placeholder="visitor" required
                                value="{{ old('total_visitors') }}">
                            <label for="total_visitors">Number of Visitors</label>
                            @error('total_visitors')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text">@</span>
                    <div class="form-floating">
                        <input type="text"
                            class="form-control
                  @error('instagram') is-invalid @enderror
                  "
                            id="instagram" name="instagram" placeholder="Username" value="{{ old('instagram') }}">
                        <label for="instagram">Instagram Account</label>
                        @error('instagram')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
