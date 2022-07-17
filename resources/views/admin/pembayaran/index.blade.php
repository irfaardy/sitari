
@extends('layouts.master_dashboard')
@section('title','Pembayaran Sanggar Tari')
@section('content')
	<div class="row">
		
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				<table id="pembayaran" class="table table-stripped table-bordered">
					<thead>
						<th>No Invoice</th>
						<th>Pengguna</th>
						<th>No Telp</th>
						<th>Absensi</th>
						<th>Total Biaya</th>
						<th>Status</th>
						<th>Waktu Pembayaran</th>
						<th>Bukti Transfer</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						@foreach($pembayaran as $dt)
						<tr>
							<td>{{$dt->invoice_code}}</td>
							<td>{{$dt->user->name}}</td>
							<td>{{$dt->user->no_hp}}</td>
							<td>{{$dt->jumlah_presensi}}</td>
							<td>Rp{{number_format($dt->total_harga)}}</td>
							<td>
								@if($dt->status == 0)
									<span class="badge badge-secondary">Menunggu Verifikasi</span>
								@elseif($dt->status == 1)
									<span class="badge badge-success">Lunas</span>
								@elseif($dt->status == 2)
									<span class="badge badge-danger">Ditolak</span>
								@endif
							</td>
							<td>{{$dt->dibayarkan_pada}}</td>
							<td><a href="{{route('img.tf',['file' => $dt->bukti_transfer])}}" target="_blank"><img src="{{route('img.tf',['file' => $dt->bukti_transfer])}}" height="120px"></a></td>
							<td>
								@if($dt->status == 1)
								<button class="btn btn-success btn-block btn-disabled" disabled>Setujui</button> 
								@else
								<a href="{{route('admin.pembayaran.acc',['id' => $dt->id])}}" onclick="return confirm('Apakah anda ingin menyetujui ini?')" class="btn btn-success btn-block">Setujui</a> 
								@endif
								@if($dt->status == 2 OR $dt->status == 1)
								<button class="btn btn-danger btn-block btn-disabled" disabled>Tolak</button> 
								@else
								<a href="{{route('admin.pembayaran.revoke',['id' => $dt->id])}}" onclick="return confirm('Apakah anda ingin menolak ini?')" class="btn btn-danger btn-block">Tolak</a> 
								@endif
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
    $('#pembayaran').DataTable();

} );
</script>
@endsection
