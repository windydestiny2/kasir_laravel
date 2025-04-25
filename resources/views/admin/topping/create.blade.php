<div class="row p-3">
    <div class="col-md-6">
        <div class="card">

            <div class="card-body">

            <h5><b>{{ $title }}</b></h5>
            <hr>
            
            @isset($topping)
                <form action="/admin/topping/{{ $topping->id}}" method="POST">
                    @method('put')
            @else
                <form action="/admin/topping" method="POST">
            @endisset

            <form action="/admin/topping" method="POST">
                @csrf
                    <label for="">Nama Topping</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Topping" value="{{ isset($topping) ?  $topping->name : old('name') }}">
                    @error('name')
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

                    <a href="/admin/topping" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
            </form>
                
            </div>
        </div>
    </div>
</div>