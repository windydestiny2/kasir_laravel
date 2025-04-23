<div class="container-fluid mt-2">
	@if(auth()->check())
		<div class="alert alert-success">Halo {{ auth()->user()->name }}! Selamat Datang di Halaman Admin</div>
	@endif
</div>