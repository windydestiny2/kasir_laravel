<div class="row p-3">
    <div class="col-md-6">
        <div class="card">

            <div class="card-body">

            <h5><b>{{ $title }}</b></h5>
            <hr>
            
            @isset($produk)
                <form action="/admin/produk/{{ $produk->id}}" method="POST" enctype="multipart/form-data">
                    @method('put')
            @else
                <form action="/admin/produk" method="POST" enctype="multipart/form-data">
            @endisset

            <form action="/admin/produk" method="POST">
                @csrf
                   

                    <label for="">Nama Produk</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Produk" value="{{ isset($produk) ?  $produk->name : old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="">Nama Kategori</label>
                   <select name="kategori_id" class="form-control" @error('kategori_id') is-invalid @enderror" id=""> 
                    <option value="">--Kategori--</option>

                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}" 
                            {{ isset($produk) ? $item->id == $produk->kategori_id ? 'selected' : '' :''}}>
                            {{ $item->name }}
                        </option>
                    @endforeach

                   </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror


                    <label for="">Harga</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga" value="{{ isset($produk) ?  $produk->harga : old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="">Stok</label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Stok" value="{{ isset($produk) ?  $produk->stok : old('stok') }}">
                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror


                    <label for="">Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{ isset($produk) ?  $produk->gambar : old('gambar') }}">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    @isset($produk)
                        <img src="/{{ $produk->gambar }}" alt="" class="img-preview img-fluid mb-3 col-sm-5">
                    @endisset
                    <br>





                    <a href="/admin/produk" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
            </form>
                
            </div>
        </div>
    </div>
</div>