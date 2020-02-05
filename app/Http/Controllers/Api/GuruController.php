<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::with(['mapel'])->get();

        return response()->json([
            'type' => 'success',
            'date' => $gurus
        ], 200);
    }

    public function show($id)
    {
        $guru = Guru::find($id)->load(['mapel']);

        return response()->json([
            'type' => 'success',
            'data' => $guru
        ], 200);
    }

    public function store(Request $request)
    {
        $guru = new Guru;
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data saved successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data updated successfully'
        ], 201);
    }

    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Data deleted successfully'
        ], 200);
    }
}
