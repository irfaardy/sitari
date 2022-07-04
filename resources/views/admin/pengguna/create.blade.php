@extends('layouts.master_dashboard')
@section('title','Tambahkan Pengguna')
@section('content')
<form action="{{route('pengguna.save')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Nama Lengkap</label>
			<input class="form-control" type="text" name="name" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Email</label>
			<input class="form-control" type="email" name="email" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Password</label>
			<input class="form-control" type="password" name="password" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Konfirmasi Password</label>
			<input class="form-control" type="password" name="password_confirmation" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>No HP / WA</label>
			<input class="form-control" type="string" name="no_hp" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Role</label>
			<select name="role" class="form-control">
				<option value="member">member</option>
				<option value="admin">admin</option>
			</select>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Tempat lahir</label>
			<input class="form-control" type="text" name="tempat_lahir">
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Tanggal lahir</label>
			<input class="form-control" type="date" name="tanggal_lahir">
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Alamat</label>
			<textarea name="alamat_lengkap" class="form-control"></textarea>
			<hr>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Jenis Kelamin</label>
			<div class="mb-4">
	            <input  type="radio" value="L" id="jenis_kelamin_l" name="jenis_kelamin" checked="">
	            <label class="form-check-label text-dark" for="jenis_kelamin_l">Laki-Laki</label>
	        </div> 
	        <div class="mb-4">
	            <input  type="radio" value="P" id="jenis_kelamin_p" name="jenis_kelamin" >
	            <label class="form-check-label text-dark" for="jenis_kelamin_p">Perempuan</label>
	        </div>
		</div>

		<div class="col-md-6 col-sm-12">
			<label>Status</label>
			<div class="mb-4">
	            <input  type="radio" value="1" id="aktif" name="status" checked="">
	            <label class="form-check-label text-dark" for="aktif">Aktif</label>
	        </div> 
	        <div class="mb-4">
	            <input  type="radio" value="2" id="nonaktif" name="status" >
	            <label class="form-check-label text-dark" for="nonaktif">Non-Aktif</label>
	        </div>
		</div>

	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Tambah Pengguna</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
