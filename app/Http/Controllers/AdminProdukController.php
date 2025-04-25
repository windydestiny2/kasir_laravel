<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Kategori;
use App\Models\Topping;

class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // die('masuk');
        $data = [
            'title' => 'Manajemen Produk',
            'produk' => Produk::paginate(2),
            'content' => 'admin/produk/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = [
            'title' => 'Tambah Kategori',
            'kategori' => Kategori::all(),
            'topping' => Topping::all(),
            'content' => 'admin/produk/create'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time() . '_' . $gambar->getClientOriginalName();

            $storage = 'uploads/images/' ;
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name; 
        } else {
            $data['gambar'] = null;
        }

        Produk::create($data);
        Alert::success('Success!', 'Data berhasil ditambahkan');
        return redirect()->back();
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
        $data = [
            'title' => 'Tambah Produk',
            'kategori' => Kategori::all(),
            'produk' => Produk::find($id),
            'content' => 'admin/produk/create'

        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $produk = Produk::find($id);
        $data = $request->validate([
            'name' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time() . '_' . $gambar->getClientOriginalName();

            $storage = 'uploads/images/' ;
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name; 
        } else {
            $data['gambar'] = $produk->gambar;
        }


        $produk->update($data);
        Alert::success('Success!', 'Data berhasil diedit');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produk = Produk::find($id);
        if ($produk->gambar != null) {
            unlink($produk->gambar);
            
        }
        $produk = Produk::find($id);
        $produk->delete();
        Alert::success('Success!', 'Data berhasil dihapus');
        
        return redirect()->back();
    }
}
