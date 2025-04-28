<?php

namespace App\Http\Controllers;
use App\Models\TransaksiDetail;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Topping;
use App\Models\Produk;

class AdminTransaksiDetailController extends Controller
{
    //
    
    public function create(Request $request)
    {


        
        // Validasi input
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'produk_id' => 'required|exists:produks,id',
            'produk_name' => 'required|string',
            'harga_satuan' => 'required|numeric',
            'topping_id' => 'nullable|exists:toppings,id',
            'qty' => 'required|integer|min:1',
        ]);
    
        // Ambil harga topping jika ada
        $harga_topping = 0;
        if ($request->topping_id) {
            $topping = Topping::find($request->topping_id);
            $harga_topping = $topping ? $topping->harga : 0;
        }
    
        // Hitung subtotal
        $harga_satuan = (int) $request->harga_satuan;
        $qty = (int) $request->qty;
        $harga_topping = (int) $harga_topping;

        $subtotal = ($harga_satuan * $qty) + ($harga_topping * $qty);
    
        // Simpan data ke tabel transaksi_details
        TransaksiDetail::create([
            'transaksi_id' => $request->transaksi_id,
            'produk_id' => $request->produk_id,
            'produk_name' => $request->produk_name,
            'topping_id' => $request->topping_id,
            'qty' => $request->qty,
            'subtotal' => $subtotal,
        ]);

        dd([
            'harga_satuan' => $request->harga_satuan,
            'qty' => $request->qty,
            'harga_topping' => $harga_topping,
            'subtotal' => ($request->harga_satuan * $request->qty) + ($harga_topping * $request->qty),
        ]);
    
        return redirect()->back()->with('success', 'Detail transaksi berhasil ditambahkan.');
    }
}
