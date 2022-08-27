@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Akun</h1>
    </div>
    @if (session()->has('success'))
        {{-- <p> {{ session('success') }}</p> --}}
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    {{-- <th scope="col">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- <td>{{ $user->is_admin }}</td> --}}
                        <td>
                            <form action="/dashboard/account/{{ $user->id }}" method="post" class="d-inline">
                                @method('PUT')
                                @csrf
                                {{-- <input type="text" name="name" value="{{ $user->name }}">
                    <input type="hidden" name="email" value="{{ $user->email }}">
                    <input type="hidden" name="password" value="{{ $user->password }}"> --}}
                                {{-- <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_admin" id="inlineRadio1" value=1
                                        @if ($user->is_admin) checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">Admin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_admin" id="inlineRadio2" value=0
                                        @if (!$user->is_admin) checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">Non-Admin</label>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success">submit</button> --}}
                                @if ($user->is_admin)
                                    <input type="hidden" name="is_admin" value=0>
                                @else
                                    <input type="hidden" name="is_admin" value=1>
                                @endif
                                <button type="submit" class="btn btn-sm btn-success"
                                    onclick="return confirm('Anda Yakin Ingin Mengubah Status Akun {{ $user->name }}?')"
                                    @if (auth()->user()->id !== $user->id && $user->id !== 1) disabled @endif>
                                    @if ($user->is_admin)
                                        Admin
                                    @else
                                        Non Admin
                                    @endif
                                </button>
                            </form>
                            {{-- <a href="/dashboard/account/{{ $user->id }}/edit" class="btn btn-primary">edit</a> --}}
                        </td>
                        {{-- <td>
                            <form action="/dashboard/account/{{ $user->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Anda Yakin Ingin Menghapus Akun {{ $user->name }}?')"
                                    @if (auth()->user()->id == $user->id) disabled @endif>delete</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
@endsection
