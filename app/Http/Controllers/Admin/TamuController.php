<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TamuController extends Controller
{
    public function index(){
        $data = User::all();
        return view('Admin.Tamu.index', compact('data'));
    }

    public function formTambah(){
        return view('Admin.Tamu.formTambah');
    }
    public function formCetak(){
        $data = User::all();
        return view('Admin.Tamu.formCetak', compact('data'));
    }

    public function simpanData(Request $request){
        $name    = $request->nama;
        $tlp = $request->tlp;
        $alamat  = $request->alamat;
        $email   = $request->email;

        $data = new User;
        $data->name = $name;
        $data->tlp = $tlp;
        $data->alamat = $alamat;
        $data->email = $email;
        $data->password = Hash::make('rahasia');

        $data->save();

        return redirect('admin/tamu')->with('status', 'Data Berhasil Disimpan');

    }

    public function formEdit($id){
        $data = User::find($id);
        return view('Admin.Tamu.formEdit', compact('data'));
    }

    public function updateTamu(Request $request){
        $id      = $request->id;
        $name    = $request->nama;
        $telepon = $request->telepon;
        $alamat  = $request->alamat;
        $email   = $request->email;
        $keperluan   = $request->keperluan;

        $data = User::find($id);
        $data->name   = $name;
        $data->tlp    = $telepon;
        $data->alamat = $alamat;
        $data->email  = $email;
        $data->keperluan  = $keperluan;
        $data->update();

        return redirect('admin/tamu')->with('status', 'Data Berhasil Diupdate');
    }

    public function hapusTamu(Request $request){
        $id = $request->id;
        $data = User::find($id);
        $data->delete();

        return redirect('admin/tamu')->with('status', 'Data Berhasil Dihapus');
    }
}
