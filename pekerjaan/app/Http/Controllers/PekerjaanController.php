<?php

namespace App\Http\Controllers;

use App\Models\pekerjaan;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::all();
        $data['message'] = true;
        $data['result'] = $pekerjaan;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'gaji' => 'required|numeric',
        ]);

        $result = Pekerjaan::create($validate); // simpan ke tabel ku$kucing
        if ($result) {
            $data['success'] = true;
            $data['message'] = "Data pekerjaan berhasil disimpan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(pekerjaan $pekerjaan)
    {
        $pekerjaan = pekerjaan::find($pekerjaan);
        $data['success'] = true;
        $data['message'] = "Detail data fakultas";
        $data['result'] = $pekerjaan;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'gaji' => 'required|numeric',

          ]);

          $result = Pekerjaan::where('id', $id)->update($validate);
          if ($result) {
              $data['success'] = true;
              $data['message'] = "Data pekerjaan berhasil disimpan";
              $data['result'] = $result;
              return response()->json($data, Response::HTTP_CREATED);
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        if($pekerjaan){
            $pekerjaan->delete();
            $data['success'] = true;
            $data['message'] = 'Data pekerjaan Berhasil Dihapus';
            return response()->json($data, Response::HTTP_OK);
        } else {
            $data['success'] = false;
            $data['message'] = 'Data pekerjaan Tidak Ada';
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
