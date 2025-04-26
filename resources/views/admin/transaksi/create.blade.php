<div class="row mt-1 p-3">

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">Kode Produk</label>
                    </div>
                        
                    <div class="col-md-8">
                        <select name="produk_id" class="form-control" id="">
                            <option value="">--Kode Produk--</option> 
                        </select>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">Nama Produk</label>
                    </div>
                        
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_produk" id="" placeholder="Nama Produk">
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">Harga Satuan</label>
                    </div>
                        
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="harga_satuan" id="" placeholder="Harga Satuan">
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">QTY</label>
                    </div>
                        
                    <div class="col-md-8">
                        <div class="d-flex">
                            <button class="btn btn-primary"><i class="fas fa-minus"></i></button>
                            <input type="number" class="form-control" name="qty" id="" placeholder="Qty">
                            <button class="btn btn-primary"><i class="fas fa-plus"></i></button>
                            
                        </div>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">Topping</label>
                    </div>
                        
                    <div class="col-md-8">
                        <select name="topping" class="form-control" id="">
                            <option value="">--Opsional--</option> 
                        </select>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">Harga Topping</label>
                    </div>
                        
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="harga_topping" id="" placeholder="Harga Topping">
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-4">
                        
                    </div>
                        
                    <div class="col-md-8">
                        <h5>Subtotal : Rp. 20000</h5>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-4">
                        
                    </div>
                        
                    <div class="col-md-8">
                        <a href="/admin/transaksi" class="btn btn-info"><i class="fas fa-arrow-left"> Kembali</i></a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"> Tambah</i></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>No</td>
                        <td>Nama Produk</td>
                        <td>Harga Satuan</td>
                        <td>Topping</td>
                        <td>Harga Topping</td>
                        <td>Qty</td>
                        <td>#</td>
                        <td>
                            <a href=""><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                </table>

                    <a href="" class="btn btn-success"><i class="fas fa-check"></i> Selesai</a>
                    <a href="" class="btn btn-info"><i class="fas fa-file"></i> Pending</a>
                    


                    <!-- @foreach ($transaksi as $item) 
                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->produk_id }}</td>
                        <td>{{ $item->harga_satuan }}</td>
                        <td>{{ $item->harga_topping }}</td>
                        <td>{{ $item->topping }}</td>
                        <td>{{ $item->qty }}</td>
                        
                        <td>
                            <div class="d-flex">
                                <a href="/admin/topping/{{ $item->id }}/edit" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a> 
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> 
                            </div>
                            
                        </td>
                    </tr>

                    
                

                
                     @endforeach  -->

                
            </div>
        </div>
    </div>
</div>

<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

            <div class="form-group">
                <label for="">Total Belanja</label>
                <input type="number" class="form-control" name="total_belanja" id="" placeholder="Total Belanja">
            </div>

            <div class="form-group">
                <label for="">Dibayarkan</label>
                <input type="number" class="form-control" name="dibayarkan" id="" placeholder="Dibayarkan">
            </div>
            
            <button type="submit" class="btn btn-primary btn-block"> Hitung</button>
            <hr>

            <div class="form-group">
                <label for="">Uang Kembalian</label>
                <input type="number" disabled class="form-control" name="kembalian" id="" placeholder="Kembalian">
            </div>


            </div>
        </div>
    </div>
</div>