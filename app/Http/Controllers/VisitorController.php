<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Visitor::all();
        if(request()->start_date && request()->end_date) {
            $start_date = Carbon::parse(request()->start_date);
            $end_date = Carbon::parse(request()->end_date);
            // ddd($end_date);
            if ($end_date->greaterThanOrEqualTo($start_date)) {
                if (request()->type !== 'All') {
                    $type = request()->type;
                    return view('dashboard.visitor', [
                        // "visitors" => Visitor::whereBetween('created_at', [$start_date, $end_date])->where('type','LIKE','%'.$type.'%')->orderBy('created_at', 'ASC')->get()
                        "visitors" => Visitor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('type','LIKE','%'.$type.'%')->orderBy('created_at', 'ASC')->get(),
                        "start_date" => $start_date,
                        "end_date" => $end_date,
                        "type" => $type,
                        "type_filter" => true,
                        "date_filter" => true,
                        "filter" => true,
                        "visitor_count" => Visitor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('type','LIKE','%'.$type.'%')->sum('total_visitors'),
                    ]);
                }
                // dd(Visitor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->whereYear('created_at', '=', Carbon::now()->year)->where('type','LIKE','%Umum%')->sum('total_visitors'));
                return view('dashboard.visitor', [
                    // "visitors" => Visitor::whereBetween('created_at', [$start_date, $end_date])->orderBy('created_at', 'ASC')->get()
                    "visitors" => Visitor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->orderBy('created_at', 'ASC')->get(),
                    "start_date" => $start_date,
                    "end_date" => $end_date,
                    "type_filter" => false,
                    "date_filter" => true,
                    "filter" => true,
                    "visitor_tk" => Visitor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('type','LIKE','%TK%')->sum('total_visitors'),
                    "visitor_sd" => Visitor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('type','LIKE','%SD%')->sum('total_visitors'),
                    "visitor_smp" => Visitor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('type','LIKE','%SMP%')->sum('total_visitors'),
                    "visitor_sma" => Visitor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('type','LIKE','%SMA%')->sum('total_visitors'),
                    "visitor_mahasiswa" => Visitor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('type','LIKE','%Mahasiswa%')->sum('total_visitors'),
                    "visitor_umum" => Visitor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('type','LIKE','%Umum%')->sum('total_visitors'),
                    "visitor_total" => Visitor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->sum('total_visitors'),
                ]);
            } else {
                return back()->with('date_error', 'Tanggal Mulai Harus Kurang dari Tanggal Akhir');
            }
        }
        if (request()->start_date || request()->end_date) {
            if (!request()->start_date || !request()->end_date) {
                return back()->with('date_error', 'Tanggal Mulai dan Tanggal Akhir Harus Diisi');
            }
        }
        if (request()->type) {
            $type = request()->type;
            if ($type !== 'All') {
                return view('dashboard.visitor', [
                    "visitors" => Visitor::where('type','LIKE','%'.$type.'%')->orderBy('created_at', 'ASC')->get(),
                    "type" => $type,
                    "type_filter" => true,
                    "date_filter" => false,
                    "filter" => true,
                    "type" => $type,
                    "visitor_count" => Visitor::where('type','LIKE','%'.$type.'%')->sum('total_visitors')
                ]);
            }
        }

        return view('dashboard.visitor', [
            // "visitors" => Visitor::latest()->paginate(50)
            "visitors" => Visitor::orderBy('created_at', 'ASC')->get(),
            "type_filter" => false,
            "date_filter" => false,
            "filter" => false
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index', [
            'title' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateVisitor = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'institution' => 'nullable',
            'type' => 'required',
            'total_visitors' => 'required',
            'instagram' => 'nullable',
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        Visitor::create($validateVisitor);

        session()->flash('success', 'Your Data Has Been Recorded, Enjoy the Museum');
        return redirect('/');
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
        Visitor::truncate();
        return redirect('/dashboard/visitor')->with('success', 'Seluruh Data Telah Berhasil Dihapus');
    }
}
