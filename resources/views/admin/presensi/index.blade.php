
@extends('layouts.master_dashboard')
@section('title','Presensi Anggota')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<a href="{{route('presensi.create')}}" class="btn btn-primary btn-block">Tambah Presensi</a>
				</div>
				<div class="col-sm-12 col-md-6">
					<a href="{{route('presensi.create')}}" class="btn btn-primary btn-block">Export Presensi</a>
				</div>
			</div>
		</div>
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				<table id="pengguna" class="table table-stripped table-bordered">
					<thead>
						<th>name</th>
						<th>no hp</th>
						<th>Tanggal</th>
						<th>Status Kehadiran</th>
						<th>aksi</th>
					</thead>
					<tbody>
						@foreach($presensi as $dt)
						<tr>
							<td>{{$dt->user->name}}</td>
							<td>{{$dt->user->no_hp}}</td>
							<td>{{$dt->tanggal}}</td>
							<td>
								@if($dt->status_kehadiran == "H") 
								<span class="badge badge-success">Hadir</span>
								@elseif($dt->status_kehadiran == "I")
								<span class="badge badge-secondary">Izin</span>
								@elseif($dt->status_kehadiran == "A")
								<span class="badge badge-danger">Alpha</span>
								@elseif($dt->status_kehadiran == "S")
								<span class="badge badge-info">Sakit</span>
								@endif
							</td>
							<td>
								<a href="{{route('presensi.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a>
								<a onclick="return confirm('Apakah anda yakin ingin menghapus ini?');" href="{{route('presensi.delete',['id' => $dt->id])}}" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready( function () {
    $('#pengguna').DataTable();

} );
</script>
@endsection
