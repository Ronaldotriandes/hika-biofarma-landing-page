<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Aspirasi;
use Exception;
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
        try {
            //code...
            $anggota = Anggota::where('id', Auth::user()->id)->first();
            return view('Profile', ['anggota' => $anggota]);
        } catch (Exception $th) {
            return redirect()->back()->with('error', 'Gagal mengambil data anggota.');
        }
        //
    }
    public function pengurushika()
    {
        try {
            //code...
            $pengurus = Anggota::with('strukturOrganisasi:id,nama_jabatan')->whereNotNull('id_struktur_organisasi')->orderBy('id', 'asc')->get();
            return view('Pengurus-Hika', ['pengurus' => $pengurus]);
        } catch (Exception $th) {
            return redirect()->back()->with('error', 'Gagal mengambil data pengurus.');
        }
    }

    public function formregistrasi()
    {
        //
        return view('Form-Registrasi');
    }
    public function Postformregistrasi(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:L,P',
                'agama' => 'required|string',
                'alamat_domisili' => 'required|string',
                'nomor_telepon' => 'required|string',
                'email_pribadi' => 'required|email',
                'hobby' => 'nullable|string',
                'nip' => 'required|string|max:12',
                'departemen_kerja' => 'required|string',
                'npk' => 'required|string|max:12',
                'direktorat_kerja' => 'required|string',
                'tanggal_pensiun' => 'nullable|date',
                'email_kantor' => 'required|email',
                'status_pegawai' => 'required|string',
                'status_bekerja' => 'required|string',
                'status_anggota' => 'required|string',
                'komunitas' => 'nullable|string',
                'pengalaman_organisasi' => 'nullable|string',
                'serikat_pekerja_lain' => 'nullable|string',
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'password' => 'required|string|min:6'
            ]);
            $fileName = null;
            if ($request->hasFile('foto')) {
                $fileName = time() . '.' . $request->foto->extension();
                $request->foto->move('images/profile', $fileName);
            }
            $anggota = Anggota::create([
                'nama_lengkap' => $validated['nama_lengkap'],
                'tempat_lahir' => $validated['tempat_lahir'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'alamat' => $validated['alamat_domisili'],
                'agama' => $validated['agama'],
                'no_hp' => $validated['nomor_telepon'],
                'email_pribadi' => $validated['email_pribadi'],
                'nip' => $validated['nip'],
                'npk' => $validated['npk'],
                'departemen_kerja' => $validated['departemen_kerja'],
                'direktorat_kerja' => $validated['direktorat_kerja'],
                'email_kantor' => $validated['email_kantor'],
                'role' => 'non-Member',
                'status_pegawai' => $validated['status_pegawai'],
                'status_bekerja' => $validated['status_bekerja'],
                'status_anggota' => $validated['status_anggota'],
                'komunitas' => $validated['komunitas'],
                'pengalaman_organisasi' => $validated['pengalaman_organisasi'],
                'serikat_lain' => $validated['serikat_pekerja_lain'],
                'is_active' => false,
                'is_admin' => false,
                'images' => 'assets/images/faces/2.jpg',
                'password' => Hash::make(trim($validated['password'])), // Using last 4 digits of NIK as default password
            ]);
            return redirect('/')->with('success', 'Registrasi berhasil! Silahkan tunggu persetujuan dari admin.');
        } catch (Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    public function aspirasi(Request $request)
    {
        try {
            Aspirasi::create([
                'aspirasi' => $request->message,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->back()->with('success', 'Aspirasi berhasil disimpan.');
            //code...
        } catch (Exception $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Gagal menyimpan aspirasi.');
        }
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $anggota = Anggota::find(Auth::user()->id);

        if ($request->hasFile('photo')) {
            if ($anggota->images && file_exists($anggota->images)) {
                unlink(public_path($anggota->images));
            }

            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move('images/profile', $fileName);

            $anggota->images = 'images/profile/' . $fileName;
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
