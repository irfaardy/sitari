@extends('layouts.master_dashboard')
@section('title','Dashboard')
@section('content')
	<h4>Pengumuman</h4>
	<div class="row">
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
								<a href="{{route('pengumuman.detail',['id' => $dt->id])}}" class="btn btn-success">Selengkapnya</a>
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