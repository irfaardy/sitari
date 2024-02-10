
@extends('layouts.master_dashboard')
@section('title','Pengumuman Sanggar')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<a href="{{route('pengumuman.create')}}" class="btn btn-primary btn-block">Tambah Pengumuman</a>
				</div>
			</div>
			
		</div>
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				<table id="pengumuman" class="table table-stripped table-bordered">
					<thead>
						<th>Judul</th>
						<th>Deskripsi</th>
						<th>Tanggal</th>
						<th>aksi</th>
					</thead>
					<tbody>
						@foreach($pengumuman as $dt)
						<tr>
							<td>{{$dt->title}}</td>
							<td>{{strip_tags(Str::limit($dt->deskripsi,60))}}</td>
							<td>{{$dt->created_at}}</td>
							<td>
								<a href="{{route('pengumuman.detail',['id' => $dt->id])}}" class="btn btn-success">Detail</a>
								<a href="{{route('pengumuman.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a>
								<a onclick="return confirm('Apakah anda yakin ingin menghapus ini?');" href="{{route('pengumuman.delete',['id' => $dt->id])}}" class="btn btn-danger">Hapus</a>
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
    $('#pengumuman').DataTable();

} );
</script>
@endsection
