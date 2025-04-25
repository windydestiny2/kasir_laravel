<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topping;
use RealRashid\SweetAlert\Facades\Alert;

class AdminToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // die('masuk');
        $data = [
            'title' => 'Manajemen Topping',
            'topping' => Topping::paginate(5),
            'content' => 'admin/topping/index'
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
            'title' => 'Tambah Topping',
            'content' => 'admin/topping/create'
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
            'name' => 'required|unique:toppings',
        ]);
        Topping::create($data);
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
            'title' => 'Tambah Topping',
            'topping' => Topping::find($id),
            'content' => 'admin/topping/create'

        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $topping = Topping::find($id);
        $data = $request->validate([
            'name' => 'required|unique:toppings,name,' . $topping->id,
        ]);
        $topping->update($data);
        Alert::success('Success!', 'Data berhasil diedit');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $topping = Topping::find($id);
        $topping->delete();
        Alert::success('Success!', 'Data berhasil dihapus');
        return redirect()->back();
    }
}
