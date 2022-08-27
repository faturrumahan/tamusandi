@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pengunjung</h1>
        <div class="div">
            <button type="button" class="btn btn-success" onclick="excel()">Unduh</button>
            <form action="/dashboard/visitor" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger"
                    onclick="return confirm('Anda Yakin Ingin Menghapus Seluruh Data?')">Hapus</button>
            </form>
        </div>
    </div>

    {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
    <div class="mb-3">
        {{-- @if (session()->has('success'))
            <p> {{ session('success') }}</p>
        @endif --}}
        <h4>Filter</h4>
        <form action="/dashboard/visitor" method="get">
            <div class="col">
                <div class="row">
                    <div class="col-8 col-lg-2">
                        <label for="start" class="form-label">Mulai Tanggal</label>
                        <input type="date" class="form-control" name="start_date" id="start"
                            @if ($date_filter) value={{ $start_date }} @endif>
                    </div>
                    <div class="col-8 col-lg-2">
                        <label for="end" class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" name="end_date" id="end"
                            @if ($date_filter) value={{ $end_date }} @endif>
                    </div>
                </div>
                @if (session()->has('date_error'))
                    <p class="text-danger"> {{ session('date_error') }}</p>
                @endif
                <div class="row mt-2 mb-2">
                    <div class="col-8 col-lg-2">
                        <label for="from" class="form-label">Kategori Pengunjung</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="from" name="type">
                                <option value="All">Semua</option>
                                <option value="Umum" @if ($type_filter && $type == 'Umum') selected @endif>Umum</option>
                                <option value="TK" @if ($type_filter && $type == 'TK') selected @endif>TK</option>
                                <option value="SD" @if ($type_filter && $type == 'SD') selected @endif>SD</option>
                                <option value="SMP" @if ($type_filter && $type == 'SMP') selected @endif>SMP</option>
                                <option value="SMA" @if ($type_filter && $type == 'SMA') selected @endif>SMA</option>
                                <option value="Mahasiswa" @if ($type_filter && $type == 'Mahasiswa') selected @endif>Mahasiswa
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
            {{-- <button type="button" class="btn btn-danger">Reset</button> --}}
            <a href="/dashboard/visitor" class="btn btn-danger">Reset</a>
        </form>
    </div>

    @if ($filter)
        {{-- @if ($type_filter)
            <div class="alert alert-secondary col-3" role="alert">
                Kategori : {{ $type }}
            </div>
        @endif
        @if ($date_filter)
            @if ($start_date)
                <div class="alert alert-secondary col-3" role="alert">
                    Tanggal Mulai : {{ $start_date }}
                </div>
            @endif
            @if ($end_date)
                <div class="alert alert-secondary col-3" role="alert">
                    Tanggal Akhir : {{ $end_date }}
                </div>
            @endif
        @endif --}}
        <div class="alert alert-secondary" role="alert">
            @if ($type_filter)
                Kategori : {{ $type }}
                @if ($date_filter)
                    ,
                @endif
            @endif
            @if ($date_filter)
                @if ($start_date)
                    Tanggal Mulai : {{ $start_date->todatestring() }},
                @endif
                @if ($end_date)
                    Tanggal Akhir : {{ $end_date->todatestring() }}
                @endif
            @endif
        </div>
        @if (!$type_filter && $date_filter)
            <div class="col-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">TK</th>
                                <th scope="col">SD</th>
                                <th scope="col">SMP</th>
                                <th scope="col">SMA/SMK</th>
                                <th scope="col">Mahasiswa</th>
                                <th scope="col">Umum</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Jumlah Pengunjung</th>
                                <td>{{ $visitor_tk }}</td>
                                <td>{{ $visitor_sd }}</td>
                                <td>{{ $visitor_smp }}</td>
                                <td>{{ $visitor_sma }}</td>
                                <td>{{ $visitor_mahasiswa }}</td>
                                <td>{{ $visitor_umum }}</td>
                                <td>{{ $visitor_total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if ((!$date_filter && $type_filter) || ($date_filter && $type_filter))
            <p>Jumlah Pengunjung {{ $type }} : {{ $visitor_count }}</p>
        @endif
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-sm table-download" id="table-visitor">
            <thead>
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Jumlah Pengunjung</th>
                    <th scope="col">Instagram</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Komentar</th>
                    {{-- <th scope="col">test</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($visitors as $visitor)
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ $visitor->created_at->todatestring() }}</td>
                        <td>{{ $visitor->name }}</td>
                        <td>{{ $visitor->address }}</td>
                        <td>{{ $visitor->institution }}</td>
                        <td>{{ $visitor->type }}</td>
                        <td>{{ $visitor->total_visitors }}</td>
                        <td>{{ $visitor->instagram }}</td>
                        <td>{{ $visitor->rate }}</td>
                        <td>{{ $visitor->suggestion }}</td>
                        {{-- <td>
                            <form action="/dashboard/visitor/{{ $visitor->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button>delete</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- {{ $visitors->links() }} --}}
@endsection
