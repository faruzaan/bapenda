<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function Index(){
        $data['result'] = \App\Models\Jabatan::all();
        return view('jabatan/index')->with($data);
    }
    public function Store(Request $request){
        $input = $request->all();
        $status = \App\Models\Jabatan::create($input);

        if($status) return redirect('/jabatan')->with('success','Data Berhasil Ditambahkan');
        else return redirect('/jabatan')->with('error', 'Data Gagal Ditambahkan');
    }
    public function Update(Request $request){
        $input = $request->all();
        var_dump($input);
        $result = \App\Models\Jabatan::where('id', $input["id"])->first();
        $status = $result->update($input);

        if($status) return redirect('/jabatan')->with('success','Data Berhasil Diubah');
        else return redirect('/jabatan')->with('error', 'Data Gagal Diubah');
    }
    public function Destroy(Request $request, $id){
        $result = \App\Models\Jabatan::where('id', $id)->first();
        $status = $result->delete();

        if($status) return redirect('/jabatan')->with('success','Data Berhasil Dihapus');
        else return redirect('/jabatan')->with('error', 'Data Gagal Dihapus');
    }
}
