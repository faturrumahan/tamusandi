@extends('layouts.main')
@section('content')
    <h1 class="text-center mt-5 text-light">Thank You For Visiting Yogyakarta Cryptography Museum</h1>
    <h3 class="text-center mb-3 text-light">How Was Your Experience Here?</h3>
    <div class="text-center">
        {{-- @foreach ($visitors as $visitor)
            <a href="/suggestion/{{ $visitor->id }}/edit" class="btn btn-primary">{{ $visitor->name }}</a>
        @endforeach --}}
        <div class="d-flex justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-dark" id="table-visitor">
                        <thead>
                            <tr>
                                {{-- <th scope="col">#</th> --}}
                                {{-- <th scope="col">Nama</th>
                                <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visitors as $visitor)
                                <tr>
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    <td>{{ $visitor->name }}</td>
                                    <td><a href="/suggestion/{{ $visitor->id }}/edit" class="badge bg-primary"><i
                                                class="bi bi-arrow-right"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
