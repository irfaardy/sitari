@extends('layouts.master_dashboard')
@section('title','Ubah data Presensi')
@section('content')
<form action="{{route('presensi.update')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$presensi->id}}">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Nama Anggota</label><br>
			{{$presensi->user->name}}
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Status</label>
			<select name="status" class="form-control">
					<option value="H" @if($presensi->status_kehadiran == "H") selected @endif>Hadir</option>
					<option value="I" @if($presensi->status_kehadiran == "I") selected @endif>Izin</option>
					<option value="A" @if($presensi->status_kehadiran == "A") selected @endif>Alpha</option>
					<option value="S" @if($presensi->status_kehadiran == "S") selected @endif>Sakit</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Tanggal</label>
			<input required type="date" value="{{$presensi->tanggal}}" max="{{date('Y-m-d')}}" class="form-control" name="tanggal">
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Update Presensi</button>
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
