
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
					<a href="#"  data-toggle="modal" data-target="#export" class="btn btn-outline-success  btn-block">Export Presensi</a>
				</div>
			</div>
			<!-- Modal -->
			<form action="{{route('presensi.export')}}" method="POST">
			<div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Export Presensi
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	@csrf
			        	<div class="row">
			        		<div class="col-md-6">
			        			<label>Tgl Awal</label>
			        			<input type="date" name="start" class="form-control">
			        		</div>
			        		<div class="col-md-6">
			        			<label>Tgl Akhir</label>
			        			<input type="date" name="end" class="form-control">
			        		</div>
			        	</div>
			       
			      </div>
			      <div class="modal-footer">
			       
			        <button type="submit" class="btn btn-primary">Expor Presensi</button>
			      </div>
			    </div>
			  </div>
			</div>
			 </form>
		</div>
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				<table id="pengguna" class="table table-stripped table-bordered">
					<thead>
						<th>name</th>
						<th>no hp</th>
						<th>Grup</th>
						<th>Tanggal</th>
						<th>Status Kehadiran</th>
						<th>aksi</th>
					</thead>
					<tbody>
						@foreach($presensi as $dt)
						<tr>
							<td>{{$dt->user->name}}</td>
							<td>{{$dt->user->no_hp}}</td>
							<td>{{$dt->user->dtgrup->nama}}</td>
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
