<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Order extends Controller
{
    public function order(Request $request)
    {
        DB::table('tbl_keranjang')->insert([
            'id_user' => Session::get('id_user'),
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah
        ]);
        return redirect('/')->with('alert', 'Berhasil Ditambahkan!');
    }

    public function keranjang()
    {
        $keranjang = DB::table('keranjang')->where('nama_user', Session::get('nama_user'))->get();
        return view('/Keranjang', ['keranjang' => $keranjang]);
    }

    public function checkout()
    {
        $id_checkout = rand();
        $total = 0;
        $data = DB::table('tbl_keranjang')->where('id_user', Session::get('id_user'))->get();
        foreach ($data as $krj) {
            $barang = DB::table('tbl_barang')->where('id', $krj->id_barang)->get();
            foreach ($barang as $brg) {
                $total += ($krj->jumlah * $brg->harga);
                DB::table('detail_checkout')->insert([
                    'id_checkout' => $id_checkout,
                    'id_barang' => $krj->id_barang,
                    'jumlah' => $krj->jumlah
                ]);
            }
        }
        DB::table('tbl_checkout')->insert([
            'id_checkout' => $id_checkout,
            'id_user' => Session::get('id_user'),
            'total' => $total
        ]);
        return redirect('/Checkout_list');
    }

    public function checkout_list()
    {
        $checkout = DB::table('checkout')->where('id_user', Session::get('id_user'))->get();
        //DB::table('tbl_checkout')->delete();
        //DB::table('detail_checkout')->delete();
        return view('/Checkout', ['checkout' => $checkout]);
    }

    public function confirm()
    {
        return view('/Confirm');
    }

    public function confirm_simpan(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|max:2048' //maximal hanya 2MB 
        ]);

        $file = $request->file('file'); // menyimpan alamat file kedalam $file
        $nama_file = time() . "_" . $file->getClientOriginalName(); //mengambil nama asli dari $file, dan time() digunakan agar nama file terlihat unique

        $tujuan_upload = 'data_file';
        if ($file->move($tujuan_upload, $nama_file)) {
            DB::table('tbl_konfirmasi')->insert([
                'id_user' => Session::get('id_user'),
                'id_checkout' => $request->id_token,
                'bukti' => $nama_file
            ]);
            return redirect('/Confirm');
        }
    }
}
