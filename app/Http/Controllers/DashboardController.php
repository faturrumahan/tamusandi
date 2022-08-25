<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            'date' => Carbon::now()->format('d-m-Y'),
            // 'day' => Visitor::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get()->count(),
            // 'month' => Visitor::whereMonth('created_at', '=', Carbon::now()->month)->get()->count(),
            // 'year' => Visitor::whereYear('created_at', '=', Carbon::now()->year)->get()->count(),
            'day' => Visitor::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->sum('total_visitors'),
            'month' => Visitor::whereMonth('created_at', '=', Carbon::now()->month)->sum('total_visitors'),
            'year' => Visitor::whereYear('created_at', '=', Carbon::now()->year)->sum('total_visitors'),
            'total' => Visitor::all()->sum('total_visitors'),
            'visitors' => Visitor::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get(),
            "day_tk" => Visitor::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->where('type','LIKE','%TK%')->sum('total_visitors'),
            "day_sd" => Visitor::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->where('type','LIKE','%SD%')->sum('total_visitors'),
            "day_smp" => Visitor::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->where('type','LIKE','%SMP%')->sum('total_visitors'),
            "day_sma" => Visitor::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->where('type','LIKE','%SMA%')->sum('total_visitors'),
            "day_mahasiswa" => Visitor::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->where('type','LIKE','%Mahasiswa%')->sum('total_visitors'),
            "day_umum" => Visitor::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->where('type','LIKE','%Umum%')->sum('total_visitors'),
            "month_tk" => Visitor::whereMonth('created_at', '=', Carbon::now()->month)->where('type','LIKE','%TK%')->sum('total_visitors'),
            "month_sd" => Visitor::whereMonth('created_at', '=', Carbon::now()->month)->where('type','LIKE','%SD%')->sum('total_visitors'),
            "month_smp" => Visitor::whereMonth('created_at', '=', Carbon::now()->month)->where('type','LIKE','%SMP%')->sum('total_visitors'),
            "month_sma" => Visitor::whereMonth('created_at', '=', Carbon::now()->month)->where('type','LIKE','%SMA%')->sum('total_visitors'),
            "month_mahasiswa" => Visitor::whereMonth('created_at', '=', Carbon::now()->month)->where('type','LIKE','%Mahasiswa%')->sum('total_visitors'),
            "month_umum" => Visitor::whereMonth('created_at', '=', Carbon::now()->month)->where('type','LIKE','%Umum%')->sum('total_visitors'),
            "year_tk" => Visitor::whereYear('created_at', '=', Carbon::now()->year)->where('type','LIKE','%TK%')->sum('total_visitors'),
            "year_sd" => Visitor::whereYear('created_at', '=', Carbon::now()->year)->where('type','LIKE','%SD%')->sum('total_visitors'),
            "year_smp" => Visitor::whereYear('created_at', '=', Carbon::now()->year)->where('type','LIKE','%SMP%')->sum('total_visitors'),
            "year_sma" => Visitor::whereYear('created_at', '=', Carbon::now()->year)->where('type','LIKE','%SMA%')->sum('total_visitors'),
            "year_mahasiswa" => Visitor::whereYear('created_at', '=', Carbon::now()->year)->where('type','LIKE','%Mahasiswa%')->sum('total_visitors'),
            "year_umum" => Visitor::whereYear('created_at', '=', Carbon::now()->year)->where('type','LIKE','%Umum%')->sum('total_visitors'),
            // "total" => Visitor::all()->sum('total_visitors'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
