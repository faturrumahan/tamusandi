<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Visitor;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('suggestion.index', [
            'title' => '',
            'visitors' => Visitor::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->where('is_suggest', '=', false)->get(),
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
    public function edit(Visitor $visitor, $id)
    {
        // dd($id);
        return view('suggestion.form', [
            'title' => '',
            'visitor' => Visitor::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor, $id)
    {
        $validatedData = $request->validate([
            // 'name' => 'required',
            // 'address' => 'required',
            // 'institution' => 'nullable',
            // 'type' => 'required',
            // 'total_visitors' => 'required',
            // 'instagram' => 'nullable',
            'is_suggest' => 'required',
            'rate' => 'required',
            'suggestion' => 'nullable',
        ]);
        // ddd(User::where('id', $user->id)->update($validatedData));
        // dd($validatedData);
        // $validatedData = $request->validate($rules);

        Visitor::where('id', $id)->update($validatedData);
        // dd(User::where('id', $user->id)->update($validateData));
        return redirect('/thanks')->with('success', 'Review Has Been Recorded, Thank You For Visiting');
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
