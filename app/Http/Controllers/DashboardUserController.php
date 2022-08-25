<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.account.account', [
            "users" => User::orderBy('created_at', 'ASC')->paginate(50)
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        // $rules = [
        //     'is_admin' => 'required',
        // ];
        $validatedData = $request->validate([
            // 'name' => 'required',
            // 'email' => 'required',
            // 'password' => 'required',
            'is_admin' => 'required',
        ]);
        // ddd(User::where('id', $user->id)->update($validatedData));
        // dd($validatedData);
        // $validatedData = $request->validate($rules);

        User::where('id', $id)->update($validatedData);
        // dd(User::where('id', $user->id)->update($validateData));
        return redirect('/dashboard/account')->with('success', 'Akun Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/dashboard/account')->with('success', 'Akun Berhasil di Hapus');
    }
}
