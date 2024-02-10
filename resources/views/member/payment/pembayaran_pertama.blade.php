
@extends('layouts.master_dashboard')
@section('title','Tagihan Sanggar Tari')
@section('content')
<div class="row">
	<div class="col-md-3 col-sm-12">
		<a href="{{route('member.pembayaran.history')}}" class="btn-block btn btn-outline-primary">Riwayat Pembayaran</a>
	</div>
</div>
	<div class="row justify-content-center">
		<div class="col-md-6 col col-sm-12">
			<div class="card">
				<div class="card-body">
					@if($status != 1)
					
						<div align="center"><h5>Pembayaran Pertama</h5><h4><b>Rp{{number_format(($biaya->harga+$biaya->administrasi+(($biaya->harga+$biaya->administrasi)*($biaya->ppn/100))))}}</b></h4></div>
						<b>Rincian tagihan:</b>
						<table class="table table-bordered table-striped">
							@if(!empty($invoice))
							<tr>
								<td>Invoice Code</td>
								<td align="right">{{$invoice}}</td>
							</tr>
							@endif
							<tr>
								<td>Biaya Pendaftaran</td>
								<td align="right">Rp{{number_format($biaya->harga)}}</td>
							</tr>
							<tr>
								<td>Biaya Administrasi</td>
								<td align="right">Rp{{number_format($biaya->administrasi)}}</td>
							</tr>
							@if(!empty($biaya->ppn))
							<tr>
								<td>PPN ({{$biaya->ppn}}%)</td>
								<td align="right">Rp{{number_format(($biaya->harga+$biaya->administrasi)*($biaya->ppn/100))}}</td>
							</tr>
							@endif
							
							<tr>
								<td>Total</td>
								<td align="right">Rp{{number_format(($biaya->harga+$biaya->administrasi+(($biaya->harga+$biaya->administrasi)*($biaya->ppn/100))))}}</td>
							</tr>
						
						</table>
						@else
						<div class="alert alert-success" align="center">
								<i class="fas fa-check mr-2 fa-3x"></i><br>Terimakasih<br> biaya pendaftaran berhasil diverifikasi anda bisa melihat riwayat pembayaran di menu "Riwayat Pembayaran"
							</div>
						@endif
						<hr>
						@if($cek_pembayaran == 0)
						@if($presensi > 1)
									<a href="{{route('member.pembayaran.pendaftaran')}}" class="btn btn-primary btn-block">Bayar</a>
						@else
						<div class="alert alert-info" align="center">Tidak dapat melakukan pembayaran karena absensi anda masih kosong</div>
						@endif
						@else
							@if($status == 0)
							<div class="alert alert-secondary" align="center">
								<i class="fas fa-clock mr-2"></i>Menunggu Verifikasi
							</div>
							@elseif($status == 2)
							<div class="alert alert-danger" align="center">
								<i class="fas fa-times mr-2"></i>Ditolak
							</div>
								@if($presensi > 1)
									<a href="{{route('member.pembayaran.pendaftaran')}}" class="btn btn-primary btn-block">Bayar</a>
								@endif
							@endif
						@endif
				</div>
			</div>
		</div>
	</div>
@endsection
@section('javascript')

@endsection
