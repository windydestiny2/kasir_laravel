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
        TransaksiDetail::create($data);
        return redirect()->back();
    }
}
