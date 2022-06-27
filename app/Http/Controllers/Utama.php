<?php

namespace App\Http\Controllers;

use App\M_Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class Utama extends Controller
{
    public function index()
    {
        $barang = DB::table('tbl_barang')->get();
        return view('Utama', ['barang' => $barang]);
    }

    // MENGGUNAKAN API untuk memasukkan barang
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|max:2048' //maximal hanya 2MB 
        ]);
        $file = $request->file('file'); // menyimpan alamat file kedalam $file
        $nama_file = time() . "_" . $file->getClientOriginalName(); //mengambil nama asli dari $file, dan time() digunakan agar nama file terlihat unique

        $tujuan_upload = 'data_file';
        if ($file->move($tujuan_upload, $nama_file)) {
            $data = M_Barang::create([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'gambar' => $nama_file
            ]);

            $res['message'] = "Success BOSS!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['message'] = 'whoops!, error';
            return response($res);
        }
    }

    public function getData()
    {
        $barang = DB::table('tbl_barang')->get();
        $res = array(
            'message' => 1,
            'data' => $barang
        );

        header('Content-Type:application/json');
        return response($res);
    }
}
