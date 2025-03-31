<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function authenticate(Request $request)
    {
        try {
            $credential = $request->validate([
                'email'=>'required|email:rfc,dns',
                'password'=>'required',
            ]);

            $credential['email'] = hash('sha256', $credential['email']);
            $user = Anggota::where('hash_email', $credential['email'])
                    ->whereNull('deleted_at')
                    ->where('is_active',true)
                    ->first();
            if (!$user || !Auth::attempt(['hash_email' => $credential['email'], 'password' => $credential['password']])) {
                return back()->with('loginError','Email atau password salah, atau akses tidak diizinkan.');
            }

            $request->session()->regenerate();
            return back()->with('success','Login berhasil');

        } catch (\Throwable $th) {
            dd($th);
        }
         

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //
        Auth::logout();
        Session::flush();
        return back()->with(['success' => 'Logout berhasil!']);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
