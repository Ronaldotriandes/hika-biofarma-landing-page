<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileHika()
    {
        //
        return view('Profile-Hika');
    }
    public function profile()
    {
        //
        $anggota = Anggota::where('id', Auth::user()->id)->first();
        return view('Profile', ['anggota' => $anggota]);
    }
    public function pengurushika()
    {
        $pengurus = Anggota::with('strukturOrganisasi:id,nama_jabatan')->whereNotNull('id_struktur_organisasi')->orderBy('id', 'asc')->get();
        return view('Pengurus-Hika', ['pengurus' => $pengurus]);
    }

    public function formregistrasi()
    {
        //
        return view('Form-Registrasi');
    }

    public function aspirasi(Request $request)
    {
        //
        Aspirasi::create([
            'aspirasi' => $request->message,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Aspirasi berhasil disimpan.');
    }

    public function updatePhoto(Request $request)
{
    $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $anggota = Anggota::find(Auth::user()->id);

    if ($request->hasFile('photo')) {
        if ($anggota->images && file_exists('images/profile/' . $anggota->images)) {
            unlink(public_path('images/profile/' . $anggota->images));
        }

        $fileName = time() . '.' . $request->photo->extension();
        $request->photo->move('images/profile', $fileName);
        
        $anggota->images = $fileName;
        $anggota->save();

        return response()->json([
            'success' => true,
            'message' => 'Photo updated successfully'
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Failed to update photo'
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
