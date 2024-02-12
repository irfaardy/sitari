
@extends('layouts.master_dashboard')
@section('title','Grup')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<a href="{{route('grup.create')}}" class="btn btn-primary btn-block">Tambah Grup Baru</a>
				</div>
			</div>
		</div>
		<div class="col-12">
		
			<hr>
			<div class="table-responsive">
				<table id="grup" class="table table-stripped table-bordered">
					<thead>
						<th>Nama Grup</th>
						<th>Deskripsi</th>
						<th>Bawaan Ketika Pendaftaran</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						@foreach($data as $dt)
						<tr>
							<td>{{$dt->nama}}</td>
							<td>{{$dt->deskripsi}}</td>
							<td>
								@if($dt->grup_bawaan)
									<span class="badge badge-primary">Ya</span>
								@else
								-
								@endif
							</td>
							<td><a href="{{route('grup.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a><a href="{{route('grup.edit',['id' => $dt->id])}}" class="btn btn-danger">Delete</a></td>
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
    $('#grup').DataTable();

} );
</script>
@endsection
