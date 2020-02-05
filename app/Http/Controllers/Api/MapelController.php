<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mapel;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::with(['koneksi'])->get();

        return response()->json([
            'type' => 'success',
            'date' => $mapels
        ], 200);
    }

    public function show($id)
    {
        $mapel = Mapel::find($id)-load(['koneksi']);

        return response()->json([
            'type' => 'success',
            'data' => $mapel
        ], 200);
    }

    public function store(Request $request)
    {
        $mapel = new Mapel;
        $mapel-> nama = $request->nama;
        $mapel-> materi =$request->materi;
        $mapel-> guru_id = $request->guru_id;
        $mapel->save();

        $mapel->koneksi()->attach($request->koneksi);
        

        return response()->json([
            'type' => 'success',
            'message' => 'Data saved successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $mapel = Mapel::find($id);
        $mapel-> nama = $request->nama;
        $mapel -> materi = $request->materi;
        $mapel-> guru_id = $request->guru_id;
        $mapel->save();

        $mapel->koneksi()->attach($request->koneksi);

        return response()->json([
            'type' => 'success',
            'message' => 'Data updated successfully'
        ], 201);
    }

    public function destroy($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Data deleted successfully'
        ], 200);
    }
}
