@extends('layouts.main')
@section('content')
    <h1 class="text-center mt-5 text-light">Review</h1>
    <h3 class="text-center mb-3 text-light">Help Us to Rate the Museum</h3>
    <form action="/suggestion/{{ $visitor->id }}" method="post">
        @method('put')
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-6">
                {{-- <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="address">
                </div>
            </div>
            <div class="row mb-3">
                <label for="from" class="col-sm-2 col-form-label">Asal</label>
                <div class="col-sm-10">
                    <select class="form-select" id="from">
                        <option selected>Umum</option>
                        <option value="1">SD</option>
                        <option value="2">SMP</option>
                        <option value="3">SMA</option>
                        <option value="4">Mahasiswa</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="visitor" class="col-sm-2 col-form-label">Jumlah Pengunjung</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="visitor" min="1">
                </div>
            </div>
            <div class="row mb-3">
                <label for="ig" class="col-sm-2 col-form-label">Instagram</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ig">
                </div>
            </div> --}}
                {{-- <div class="form-floating mb-2">
                    <input type="text"
                        class="form-control
                @error('name') is-invalid @enderror
                "
                        id="name" name="name" placeholder="name" required value="{{ old('name', $visitor->name) }}">
                    <label for="name">Nama</label>
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
                        id="address" name="address" placeholder="address" required
                        value="{{ old('address', $visitor->address) }}">
                    <label for="address">Alamat</label>
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
                        value="{{ old('institution', $visitor->institution) }}">
                    <label for="institution">Instansi</label>
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
                                <option value="Umum" @if ($visitor->type == 'Umum') selected @endif>Umum</option>
                                <option value="TK" @if ($visitor->type == 'TK') selected @endif>TK</option>
                                <option value="SD" @if ($visitor->type == 'SD') selected @endif>SD</option>
                                <option value="SMP" @if ($visitor->type == 'SMP') selected @endif>SMP</option>
                                <option value="SMA" @if ($visitor->type == 'SMA') selected @endif>SMA</option>
                                <option value="Mahasiswa" @if ($visitor->type == 'Mahasiswa') selected @endif>MAhasiswa
                                </option>
                            </select>
                            <label for="floatingSelect">Kategori</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-2">
                            <input type="number"
                                class="form-control
                      @error('total_visitors') is-invalid @enderror
                      "
                                id="total_visitors" name="total_visitors" placeholder="visitor" required
                                value="{{ old('total_visitors', $visitor->total_visitors) }}">
                            <label for="total_visitors">Jumlah Pengunjung</label>
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
                            id="instagram" name="instagram" placeholder="Username"
                            value="{{ old('instagram', $visitor->instagram) }}">
                        <label for="instagram">Instagram</label>
                        @error('instagram')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div> --}}
                <div class="text-light text-center mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rate" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rate" id="inlineRadio2" value="2">
                        <label class="form-check-label" for="inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rate" id="inlineRadio3" value="3"
                            required>
                        <label class="form-check-label" for="inlineRadio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rate" id="inlineRadio4" value="4">
                        <label class="form-check-label" for="inlineRadio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rate" id="inlineRadio5" value="5">
                        <label class="form-check-label" for="inlineRadio5">5</label>
                    </div>
                </div>
                <div class="form-floating mb-2">
                    <textarea class="form-control" placeholder="Leave a comment here" id="suggestion" name="suggestion" required
                        style="height: 100px"></textarea>
                    <label for="suggestion">Comments</label>
                </div>
                <input type="hidden" name="is_suggest" value=1>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
