
@extends('layouts.master_dashboard')
@section('title','Pembayaran')
@section('content')

	<div class="row justify-content-center">
		<div class="col-md-6 col col-sm-12" align="center">
			<div class="card">
				<div class="card-body">
					<h5>Mohon untuk melakukan transfer ke rekening berikut ini: </h5>
					<div align="center"><img src="{{ asset('assets/logo/bni.jpg') }}" width="100px"></div>
						<table class="table">
							<tr>
								<td>No Rekening
									<br>
								<b>140002393</b> a.n Ayunindya</td>
							</tr>	
							<tr>
								<td>Jumlah
									<br>
								<b>Rp{{number_format(($biaya->harga+$biaya->administrasi+(($biaya->harga+$biaya->administrasi)*($biaya->ppn/100))) * $presensi)}}</b></td>
							</tr>
						</table>
						<hr>
						<form action="{{route('member.pembayaran.upload')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<label for="bukti_transfer">Bukti Transfer <small>Maks 3MB</small></label>
							<input type="file" id="bukti_transfer" name="bukti_transfer" class="form-control" required>
							<button type="submit" class="mt-2 btn btn-success btn-block">Upload Bukti Transfer</button>
						</form>
					</div>
			</div>
		</div>
	</div>
@endsection
@section('javascript')

@endsection
