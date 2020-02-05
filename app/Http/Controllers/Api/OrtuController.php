<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ortu;

class OrtuController extends Controller
{
    public function index()
    {
        $ortus = Ortu::get();

        return response()->json([
            'type' => 'success',
            'date' => $ortus
        ], 200);
    }

    public function show($id)
    {
        $ortu = Ortu::find($id);

        return response()->json([
            'type' => 'success',
            'data' => $ortu
        ], 200);
    }

    public function store(Request $request)
    {
        $ortu = new Ortu;
        $ortu->nama = $request->nama;
        $ortu->alamat = $request->alamat;
        // $ortu->siswa_id = $request->siswa_id;
        $ortu->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data saved successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $ortu = Ortu::find($id);
        $ortu->nama = $request->nama;
        $ortu->alamat = $request->alamat;
        // $ortu->siswa_id = $request->siswa_id;
        $ortu->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data updated successfully'
        ], 201);
    }

    public function destroy($id)
    {
        $ortu = Ortu::find($id);
        $ortu->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Data deleted successfully'
        ], 200);
    }
}
