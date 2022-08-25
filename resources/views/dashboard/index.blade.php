@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <h4>{{ $date }}</h4>
    </div>

    {{-- <div class="text-center text-lg-start">
        <h5>Jumlah pengunjung hari ini : {{ $day }}</h5>
        <h5>Jumlah pengunjung bulan ini: {{ $month }}</h5>
        <h5>Jumlah pengunjung tahun ini: {{ $year }}</h5>
        <h5>Jumlah pengunjung total: {{ $total }}</h5>
    </div> --}}
    <div class="col-5 mb-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">TK</th>
                    <th scope="col">SD</th>
                    <th scope="col">SMP</th>
                    <th scope="col">SMA</th>
                    <th scope="col">Mahasiswa</th>
                    <th scope="col">Umum</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Hari ini</th>
                    <td>{{ $day_tk }}</td>
                    <td>{{ $day_sd }}</td>
                    <td>{{ $day_smp }}</td>
                    <td>{{ $day_sma }}</td>
                    <td>{{ $day_mahasiswa }}</td>
                    <td>{{ $day_umum }}</td>
                    <td>{{ $day }}</td>
                </tr>
                <tr>
                    <th scope="row">Bulan ini</th>
                    <td>{{ $month_tk }}</td>
                    <td>{{ $month_sd }}</td>
                    <td>{{ $month_smp }}</td>
                    <td>{{ $month_sma }}</td>
                    <td>{{ $month_mahasiswa }}</td>
                    <td>{{ $month_umum }}</td>
                    <td>{{ $month }}</td>
                </tr>
                <tr>
                    <th scope="row">Tahun ini</th>
                    <td>{{ $year_tk }}</td>
                    <td>{{ $year_sd }}</td>
                    <td>{{ $year_smp }}</td>
                    <td>{{ $year_sma }}</td>
                    <td>{{ $year_mahasiswa }}</td>
                    <td>{{ $year_umum }}</td>
                    <td>{{ $year }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm" id="table-visitor">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Jumlah Pengunjung</th>
                    <th scope="col">Instagram</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Kritik & Saran</th>
                    {{-- <th scope="col">test</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($visitors as $visitor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td>{{ $visitor->created_at->todatestring() }}</td> --}}
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

    {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
@endsection
