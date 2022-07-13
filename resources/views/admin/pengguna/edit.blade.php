@extends('layouts.master_dashboard')
@section('title','Ubah data Pengguna')
@section('content')
<form action="{{route('pengguna.update')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$user->id}}">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Nama Lengkap</label>
			<input class="form-control" type="text" value="{{$user->name}}" name="name" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Email</label>
			<input class="form-control" type="email" value="{{$user->email}}" name="email" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Password</label>
			<input class="form-control" type="password" name="password" >
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Konfirmasi Password</label>
			<input class="form-control" type="password" name="password_confirmation" >
		</div>
		<div class="col-md-6 col-sm-12">
			<label>No HP / WA</label>
			<input class="form-control" type="string" value="{{$user->no_hp}}" name="no_hp" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Role</label>
			<select name="role" class="form-control">
				<option value="member" @if($user->role == "member") selected="" @endif>member</option>
				<option value="admin" @if($user->role == "admin") selected="" @endif>admin</option>
			</select>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Tempat lahir</label>
			<input class="form-control" type="text" value="{{$user->tempat_lahir}}" name="tempat_lahir">
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Tanggal lahir</label>
			<input class="form-control" type="date" value="{{$user->tanggal_lahir}}" name="tanggal_lahir">
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Alamat</label>
			<textarea name="alamat_lengkap" class="form-control">{{$user->alamat_lengkap}}</textarea>
			<hr>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Jenis Kelamin</label>
			<div class="mb-4">
	            <input  type="radio" value="L" id="jenis_kelamin_l" name="jenis_kelamin" @if($user->jenis_kelamin == "L") checked="" @endif>
	            <label class="form-check-label text-dark" for="jenis_kelamin_l">Laki-Laki</label>
	        </div> 
	        <div class="mb-4">
	            <input  type="radio" value="P" id="jenis_kelamin_p" name="jenis_kelamin" @if($user->jenis_kelamin == "P") checked="" @endif>
	            <label class="form-check-label text-dark" for="jenis_kelamin_p">Perempuan</label>
	        </div>
		</div>

		<div class="col-md-6 col-sm-12">
			<label>Status</label>
			<div class="mb-4">
	            <input  type="radio" @if($user->status == "1") checked="" @endif value="1" id="aktif" name="status" >
	            <label class="form-check-label text-dark" for="aktif">Aktif</label>
	        </div> 
	        <div class="mb-4">
	            <input @if($user->status == "2") checked="" @endif  type="radio" value="2" id="nonaktif" name="status" >
	            <label class="form-check-label text-dark" for="nonaktif">Non-Aktif</label>
	        </div>
		</div>

	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Update data Pengguna</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
