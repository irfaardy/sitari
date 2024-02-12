
@extends('layouts.master_dashboard')
@section('title','Pembayaran Sanggar Tari')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<a href="#" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#report">Laporan Transaksi</a>
					<form action="{{route('admin.pembayaran.export')}}" method="post">
					<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="reportLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="reportLabel">Laporan Transaksi</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        @csrf
			        	<div class="row">
			        		<div class="col-md-12">
			        			<label>Pilih Status</label>
			        			<select name="status" required class="form-control">
			        				<option>Pilih salah satu</option>
			        				<option value="1">Lunas</option>
			        				<option value="2">Ditolak</option>
			        				<option value="0">Menunggu Verifikasi</option>
			        			</select>
			        		</div><div class="col-md-6">
			        			<label>Tgl Awal</label>
			        			<input required type="date" max="{{date('Y-m-d')}}" name="start" class="form-control">
			        		</div>
			        		<div class="col-md-6">
			        			<label>Tgl Akhir</label>
			        			<input required type="date" max="{{date('Y-m-d')}}" name="end" class="form-control">
			        		</div>
			        	</div>
					      </div>
					      <div class="modal-footer">
					      
					        <button type="submit" class="btn btn-primary">Download Laporan Transaksi</button>
					      </div>
					    </div>
					  </div>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				<table id="pembayaran" class="table table-stripped table-bordered">
					<thead>
						<th>No Invoice</th>
						<th>Jenis Pembayaran</th>
						<th>Pengguna</th>
						<th>Grup Tari</th>
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
							<td>@if($dt->registrasi_pertama) Pendaftaran @else Biaya Sesi @endif</td>
							<td>{{$dt->user->name}}</td>
							<td>{{$dt->user->dtgrup->nama}}</td>
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
