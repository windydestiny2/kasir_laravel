<div class="row mt-3">
    <!-- Form Pilihan Produk dan Topping -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="GET">
                    <div class="form-group">
                        <label for="produk_id">Kode Produk</label>
                        <select name="produk_id" class="form-control">
                            <option value="">--{{ isset($p_detail) ? $p_detail->name : 'Nama Produk' }}--</option>
                            @foreach ($produk as $item)
                                <option value="{{ $item->id }}" {{ request('produk_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->id . ' - ' . $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="topping_id">Topping</label>
                        <select name="topping_id" class="form-control">
                            <option value="">--{{ isset($t_detail) ? $t_detail->name : 'Nama Topping' }}--</option>
                            @foreach ($topping as $item_topping)
                                <option value="{{ $item_topping->id }}" {{ request('topping_id') == $item_topping->id ? 'selected' : '' }}>
                                    {{ $item_topping->id . ' - ' . $item_topping->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Pilih</button>
                </form>

                <hr>

                <form action="{{ route('admin.transaksi.detail.create') }}" method="POST">
                    @csrf
                    <input type="hidden" name="transaksi_id" value="{{ Request::segment(3) }}">
                    <input type="hidden" name="produk_id" value="{{ isset($p_detail) ? $p_detail->id : '' }}">
                    <input type="hidden" name="produk_name" value="{{ isset($p_detail) ? $p_detail->name : '' }}">
                    <input type="hidden" name="harga_satuan" value="{{ isset($p_detail) ? $p_detail->harga : '' }}">
                    <input type="hidden" name="topping_id" value="{{ isset($t_detail) ? $t_detail->id : '' }}">
                    <input type="hidden" name="harga_topping" value="{{ isset($t_detail) ? $t_detail->harga : '' }}">

                    <div class="form-group">
                        <label for="produk_name">Nama Produk</label>
                        <input type="text" value="{{ isset($p_detail) ? $p_detail->name : '' }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="harga_satuan">Harga Satuan</label>
                        <input type="text" value="{{ isset($p_detail) ? $p_detail->harga : '' }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="harga_topping">Harga Topping</label>
                        <input type="text" value="{{ isset($t_detail) ? $t_detail->harga : '' }}" class="form-control" readonly>
                    </div>

                    <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="">QTY</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" name="qty" class="form-control" value="{{ $qty }}" min="1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="subtotal">Subtotal</label>
                    <input type="text" name="subtotal" class="form-control" value="{{ $subtotal }}" readonly>
                </div>

                    <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    

    <!-- Tabel Transaksi -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Topping</th>
                            <th>Harga Topping</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop data transaksi -->
                        @foreach ($transaksi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->produk_id }}</td>
                                <td>{{ $item->harga_satuan }}</td>
                                <td>{{ $item->topping }}</td>
                                <td>{{ $item->harga_topping }}</td>
                                <td>{{ $item->qty }}</td>
                                
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="#" class="btn btn-success"><i class="fas fa-check"></i> Selesai</a>
                <a href="#" class="btn btn-info"><i class="fas fa-file"></i> Pending</a>
            </div>
        </div>
    </div>
</div>

<!-- Total Belanja -->
<div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="total_belanja">Total Belanja</label>
                        <input type="number" class="form-control" name="total_belanja" placeholder="Total Belanja">
                    </div>

                    <div class="form-group">
                        <label for="dibayarkan">Dibayarkan</label>
                        <input type="number" class="form-control" name="dibayarkan" placeholder="Dibayarkan">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Hitung</button>
                    <hr>

                    <div class="form-group">
                        <label for="kembalian">Uang Kembalian</label>
                        <input type="number" readonly class="form-control" name="kembalian" placeholder="Kembalian">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



