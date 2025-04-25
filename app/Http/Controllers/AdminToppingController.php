<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Kategori;
use App\Models\Topping;


class AdminToppingController extends Controller
{
    // Menampilkan halaman daftar topping
    public function index()
    {
         // die('masuk');
         $data = [
            'title' => 'Manajemen Topping',
            'topping' => Topping::paginate(5),
            'content' => 'admin/topping/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    // Menampilkan halaman tambah topping
    public function create()
    {
        $data = [
            'title' => 'Tambah Topping',
            'content' => 'admin/topping/create'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    // Menyimpan data topping baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        Topping::create([
            'name' => $request->name,
            'harga' => $request->harga,
        ]);

        return redirect('/admin/topping')->with('success', 'Topping berhasil ditambahkan.');
    }

    // Menampilkan halaman edit topping
    public function edit(Topping $topping)
    {
        $data = [
            'title' => 'Edit Topping',
            'topping' => $topping,
            'content' => 'admin/topping/create'
        ];
        
        return view('admin.layouts.wrapper', $data);
        Alert::success('Success!', 'Data berhasil diedit');
    }

    // Memperbarui data topping
    public function update(Request $request, Topping $topping)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        $topping->update([
            'name' => $request->name,
            'harga' => $request->harga,
        ]);

        return redirect('/admin/topping')->with('success', 'Topping berhasil diperbarui.');
    }

    // Menghapus topping
    public function destroy(Topping $topping)
    {
        $topping->delete();
        Alert::success('Success!', 'Data berhasil dihapus');
        return redirect('/admin/topping')->with('success', 'Topping berhasil dihapus.');
    }
}
