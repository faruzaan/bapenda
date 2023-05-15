<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function Index(){
        $data['result'] = \App\Models\Golongan::all();
        return view('golongan/index')->with($data);
    }
    public function Store(Request $request){
        $input = $request->all();
        $status = \App\Models\Golongan::create($input);

        if($status) return redirect('/golongan')->with('success','Data Berhasil Ditambahkan');
        else return redirect('/golongan')->with('error', 'Data Gagal Ditambahkan');
    }
    public function Update(Request $request){
        $input = $request->all();
        var_dump($input);
        $result = \App\Models\Golongan::where('id', $input["id"])->first();
        $status = $result->update($input);

        if($status) return redirect('/golongan')->with('success','Data Berhasil Diubah');
        else return redirect('/golongan')->with('error', 'Data Gagal Diubah');
    }
    public function Destroy(Request $request, $id){
        $result = \App\Models\Golongan::where('id', $id)->first();
        $status = $result->delete();

        if($status) return redirect('/golongan')->with('success','Data Berhasil Dihapus');
        else return redirect('/golongan')->with('error', 'Data Gagal Dihapus');
    }
}
