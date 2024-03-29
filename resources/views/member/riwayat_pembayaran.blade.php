
@extends('layouts.master_dashboard')
@section('title','Riwayat Pembayaran')
@section('content')
	<div class="row">
		
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				<table id="pembayaran" class="table table-stripped table-bordered">
					<thead>
						<th>No Invoice</th>
						<th>Biaya</th>
						<th>Administrasi</th>
						<th>PPN</th>
						<th>Absensi</th>
						<th>Total</th>
						<th>Status</th>
						<th>Waktu Pembayaran</th>
					</thead>
					<tbody>
						@foreach($pembayaran as $dt)
						<tr>
							<td>{{$dt->invoice_code}}</td>
							<td>Rp{{number_format($dt->harga)}}</td>
							<td>Rp{{number_format($dt->biaya_administrasi)}}</td>
							<td>{{empty($dt->ppn)?"-":"Rp".number_format($dt->ppn)}}</td>
							<td>{{$dt->jumlah_presensi}}</td>
							<td>Rp{{number_format($dt->total_harga)}}</td>
							<td>
								@if($dt->status == 0)
									<span class="badge badge-secondary">Menunggu Verifikasi</span>
								@elseif($dt->status == 1)
									<span class="badge badge-success">Lunas</span>
								@elseif($dt->status == 2)
									<span class="badge badge-success">Ditolak</span>
								@endif
							</td>
							<td>{{$dt->dibayarkan_pada}}</td>
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
