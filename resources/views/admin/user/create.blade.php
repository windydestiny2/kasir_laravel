<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h4><b>Tambah Data</b></h4>

                <form action="/admin/user" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for=""><b>Nama Lengkap</b></label>
                        <input type="text" class="form-control @error('name')  is-invalid @enderror" name="name" placeholder="Nama Lengkap">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for=""><b>Email</b></label>
                        <input type="email" class="form-control @error('email')  is-invalid @enderror" name="email" placeholder="Email">

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for=""><b>Password</b></label>
                        <input type="password" class="form-control @error('password')  is-invalid @enderror" name="password" placeholder="Password">

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for=""><b>Konfirmasi Password</b></label>
                        <input type="password" class="form-control @error('re_password')  is-invalid @enderror" name="re_password" placeholder="Password">

                        @error('re_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <a href="/admin/user" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>