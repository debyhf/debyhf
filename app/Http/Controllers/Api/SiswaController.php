<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with(['ortu','koneksi'])->get();

        return response()->json([
            'type' => 'success',
            'date' => $siswas
        ], 200);
    }

    public function show($id)
    {
        $siswa = Siswa::find($id)->load(['ortu','koneksi']);

        return response()->json([
            'type' => 'success',
            'data' => $siswa
        ], 200);
    }

    public function store(Request $request)
    {
        $siswa = new Siswa;
        $siswa->nama = $request->nama;
        $siswa->nim = $request->nim;
        $siswa->jekel = $request->jekel;
        $siswa->ortu_id=$request->ortu_id;
        $siswa->save();
        $siswa->koneksi()->attach($request->koneksi);

        return response()->json([
            'type' => 'success',
            'message' => 'Data saved successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->nim = $request->nim;
        $siswa->jekel = $request->jekel;
        $siswa->ortu_id=$request->ortu_id;
        $siswa->save();
        
        $siswa->koneksi()->attach($request->koneksi);

        return response()->json([
            'type' => 'success',
            'message' => 'Data updated successfully'
        ], 201);
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Data deleted successfully'
        ], 200);
    }
}
