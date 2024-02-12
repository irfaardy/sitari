@extends('layouts.master_dashboard')
@section('title','Tambahkan Grup')
@section('content')
<form action="{{route('grup.save')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Nama Grup</label>
			<input class="form-control" placeholder="GRUP A" type="text" name="nama" required>
		</div>
		<div class="col-12">
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Deskripsi / Keterangan</label>
			<textarea class="form-control" placeholder="Menghafal 10 Tarian"  name="deskripsi" required></textarea>
		</div>
		<div class="col-12">
		</div>
		<div class="col-md-6 col-sm-12">
			<input type="checkbox" id="bawaan" name="grup_bawaan" value="1">
			<label for="bawaan">Grup Bawaan Ketika Pendaftaran</label>
		</div>
		

	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Tambah Grup</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
