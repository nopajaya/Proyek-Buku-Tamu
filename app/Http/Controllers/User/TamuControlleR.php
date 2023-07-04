<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TamuControlleR extends Controller
{
    public function simpanTamu(Request $request){
        $nama    = $request->nama;
        $telepon = $request->telepon;
        $email   = $request->email;
        $alamat  = $request->alamat;
        $keperluan = $request->keperluan;

        $data = new User();
        $data->nama = $nama;
        $data->tlp = $telepon;
        $data->email = $email;
        $data->alamat = $alamat;
        $data->keperluan = $keperluan;
        $data->password = Hash::make('rahasia');
        $data->save();

        return redirect('/')->with('status', 'Data Berhasil Disimpan');
    }
}
