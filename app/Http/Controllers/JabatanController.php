<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Jabatan;
use Illuminate\Http\Request;
//use App\Repositories\JabatanRepository;


class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    //protected $Pengalaman;

    //public function __construct(JabatanRepository $Pengalaman)
    //{
    //Instance repository UserRepository kedalam property $user
    //$this->Pengalaman = $Pengalaman;
    //}

    public function index()
    {
        //
        $pegawai = Pegawai::all();
        //return view('jabatan.index', compact('pegawai'));
        return response()->json($pegawai);
    }

    public function tampil($id)
    {
        //
        $pegawai = Pegawai::find($id);
        //return view('jabatan.show', compact('pegawai'));
        return response()->json($pegawai);
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
        $jabatan = new Jabatan;
        $jabatan->nm_pekerjaan = $request->nm_pekerjaan;
        $jabatan->d_pekerjaan = $request->d_pekerjaan;
        $jabatan->pegawai_id = $request->pegawai_id;
        $jabatan->kontrak_pekerjaan = $request->kontrak_pekerjaan;
        $jabatan->save();

        //return redirect('/pegawai/' . $jabatan->pegawai_id . '/showKontrakdanJabatan');
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengalaman  $pengalaman
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengalaman  $pengalaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pegawai = Pegawai::find($id);
        $jabatan = Jabatan::find($id);
        //return view('jabatan.edit', compact('jabatan', 'pegawai'));
        return response()->json($pegawai, $jabatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengalaman  $pengalaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $jabatan = \App\Jabatan::findOrFail($id);
        $jabatan->nm_pekerjaan = $request->nm_pekerjaan;
        $jabatan->d_pekerjaan = $request->d_pekerjaan;
        $jabatan->pegawai_id = $request->pegawai_id;
        $jabatan->kontrak_pekerjaan = $request->kontrak_pekerjaan;
        $jabatan->save();

        //return redirect('/pegawai/' . $jabatan->pegawai_id . '/showKontrakdanJabatan');
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengalaman  $pengalaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jabatan = Jabatan::find($id);
        $jabatan->delete();

        //return redirect('/pegawai/' . $jabatan->pegawai_id . '/showKontrakdanJabatan');
        return response()->json($jabatan);
    }

    public function pel($id)
    {
        $pegawai = Pegawai::find($id);
        //return view('jabatan.create', ['pegawai' => $pegawai]);
        return response()->json($pegawai);
    }
}
