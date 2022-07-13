@extends('layouts.master_dashboard')
@section('title','Tambahkan Presensi')
@section('content')
<form action="{{route('presensi.save')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Pilih Anggota</label>
			<select name="user_id" id="user" class="form-control">
				@foreach($user as $dt)
					<option value="{{$dt->id}}">{{$dt->name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Status</label>
			<select name="status" class="form-control">
					<option value="H">Hadir</option>
					<option value="I">Izin</option>
					<option value="A">Alpha</option>
					<option value="S">Sakit</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Tanggal</label>
			<input type="date" max="{{date('Y-m-d')}}" class="form-control" name="tanggal">
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Tambah Presensi</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')
<script type="text/javascript">
	$(document).ready(function() {
    $('#user').select2();
});
</script>
@endsection
