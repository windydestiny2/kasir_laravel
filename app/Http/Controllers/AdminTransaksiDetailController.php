<?php

namespace App\Http\Controllers;
use App\Models\TransaksiDetail;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminTransaksiDetailController extends Controller
{
    //
    
    function create(Request $request) {
        //die('test');
        $data = [
            'produk_id' => $request->produk_id,
            'produk_name' => $request->produk_name,
            'transaksi_id' => $request->transaksi_id,
            'topping_id' => $request->topping_id,
            'qty' => $request->qty,
            'subtotal' => $request->subtotal,
        ];
        // Hitung subtotal
    $subtotal = ((float) $request->harga_satuan * (int) $request->qty) + (float) ($request->harga_topping ?? 0);

    // Simpan data ke tabel transaksi_details
    TransaksiDetail::create([
        'transaksi_id' => $request->transaksi_id,
        'produk_id' => $request->produk_id,
        'produk_name' => $request->produk_name,
        'topping_id' => $request->topping_id,
        'qty' => $request->qty,
        'subtotal' => $subtotal,
    ]);
        return redirect()->back();
    }
}
