<?php

namespace App\Http\Controllers;

use App\User;
use App\Agama;
use App\Darah;
use App\Negara;
use App\Pegawai;
use App\Keluarga;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd('masuk');
        $pegawai = Pegawai::all();
        //return view('pegawai.tampil', compact('pegawai'));
        $response = [
            'message' => 'Dashboard',
            'data' => $pegawai
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function halamanutama()
    {
        $dashboard = [
            'jumlah_user' => User::count(),
            'jumlah_pegawai' => Pegawai::count()

        ];

        //return view('pegawai.index', compact('dashboard'));
        $response = [
            'message' => 'Dashboard',
            'data' => $dashboard
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$agama = Agama::all();
        //$negara = Negara::all();
        //$darah = Darah::all();
        //$keluarga = Keluarga::all();
        return view('pegawai.tambah');
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
        // dd('msk');
        $validatedData = $request->validate([
            'nip' => ['required', 'numeric'],
            'nama' => 'required',
            'tmpt_lahir' => ['required'],
            'tgl_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
            'foto' => 'image|file',
            'nohp' => ['required', 'numeric'],
        ]);



        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('post-images');
        }

        $Pegawai = Pegawai::create($validatedData);

        //return redirect('pegawai');
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pegawai = Pegawai::find($id);
        //return view('pegawai.show', compact('pegawai'));
        return response()->json($pegawai);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $pegawai = Pegawai::find($id);

        //return view('pegawai.edit', compact('pegawai'));
        return response()->json($pegawai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validatedData = $request->validate([
            'nip' => ['required', 'numeric'],
            'nama' => 'required',
            'tmpt_lahir' => ['required'],
            'tgl_lahir' => ['required'],
            'jenis_kelamin' => ['required'],

            'alamat' => ['required'],
            'foto' => 'image|file',
            'nohp' => ['required', 'numeric'],
        ]);


        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('post-images');
        }

        $Pegawai = Pegawai::where('id', $id)->update($validatedData);

        //return redirect('pegawai');
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pegawai = Pegawai::find($id);
        $pegawai->delete();

        //return redirect('pegawai');
        return response()->json($pegawai);
    }
    //public function pdf()
    //{
    // $pegawai = Pegawai::all();
    //$pdf = PDF::loadView('pegawai.pdf', ['pegawai' => $pegawai]);
    // return $pdf->download('pegawai.pdf');
    //}
}
