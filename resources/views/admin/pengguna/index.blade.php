
@extends('layouts.master_dashboard')
@section('title','Dashboard')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<a href="{{route('pengguna.create')}}" class="btn btn-primary btn-block">Tambah Pengguna</a>
				</div>
			</div>
		</div>
		<div class="col-12">
			<hr>
			<form action="{{route('pengguna.export')}}" method="post">
				@csrf
			<div class="row">
				<div class="col-md-3 col-xs-12">
					<select class="form-control" name="group">
						<option value="">Pilih Grup</option>
						@foreach($group as $grp)
						<option value="{{$grp->id}}" @if(Request::get('group') ==  $grp->id) selected='selected' @endif)>{{$grp->nama}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-1 col-xs-12">
					<button class="btn btn-block btn-success" type="submit">Export</button>
				</div>
				
			</div>
			</form>

				<div class="row">
					<div class="col-md-12 col-xs-12">
						<hr>
						<h5>Grup</h5>
						@foreach($group as $grp)
						<a  href="{{route('pengguna',['group' => $grp->id])}}" class="btn btn-sm btn-primary">{{$grp->nama}}</a>
						@endforeach
					</div>
				</div>
		
			<hr>
			<div class="table-responsive">
				<table id="pengguna" class="table table-stripped table-bordered">
					<thead>
						<th>Name</th>
						<th>Email</th>
						<th>no hp</th>
						<th>Grup Tari</th>
						<th>role</th>
						<th>jenis kelamin</th>
						<th>status</th>
						<th>aksi</th>
					</thead>
					<tbody>
						@foreach($user as $dt)
						<tr>
							<td>{{$dt->name}}</td>
							<td>{{$dt->email}}</td>
							<td>{{$dt->no_hp}}</td>
							<td>{{$dt->dtgrup->nama}}</td>
							<td>{{$dt->role}}</td>
							<td>{{$dt->jenis_kelamin}}</td>
							<td>
								@if($dt->status == 0) 
								<span class="badge badge-secondary">Menunggu Persetujuan</span>
								@elseif($dt->status == 1)
								<span class="badge badge-success">Aktif</span>
								@elseif($dt->status == 2)
								<span class="badge badge-danger">Non-aktif</span>
								@endif
							</td>
							<td><a href="{{route('pengguna.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a></td>
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
