<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\Topping;

use RealRashid\SweetAlert\Facades\Alert;    


class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'title' => 'Manajemen Transaksi',
            'transaksi' => Transaksi::paginate(5),
            'content' => 'admin/transaksi/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    $produk = Produk::get();
    $topping = Topping::get();

    $produk_id = request('produk_id');
    $topping_id = request('topping_id');
    $p_detail = $produk_id ? Produk::find($produk_id) : null;
    $t_detail = $topping_id ? Topping::find($topping_id) : null;

    // Ensure t_detail contains the topping price if topping_id is provided
    if ($t_detail) {
        $t_detail->harga = $t_detail->harga ?? 0;
    }

    $act = request('act');
    $qty = request('qty');
    if ($act == 'min') {
        if ($qty <= 1) {
            $qty = 1;
        } else {
            $qty = $qty - 1;
        }
    } else {
        $qty = $qty + 1;
    }

    $product_subtotal = $p_detail ? $qty * $p_detail->harga : 0;
    $topping_subtotal = $t_detail ? $qty * $t_detail->harga : 0;
    $subtotal = $product_subtotal + $topping_subtotal;

    // Ensure topping price is included in the subtotal
    if ($t_detail) {
        $subtotal += $topping_subtotal;
    }



    $data = [
        'title' => 'Tambah Transaksi',
        'produk' => $produk,
        'p_detail' => $p_detail,

        'qty' => $qty,
        'subtotal' => $subtotal,

        'topping' => $topping,
        't_detail' => $t_detail,
        'transaksi' => Transaksi::all(),
        'content' => 'admin/transaksi/create'
    ];
    return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
