@extends('layouts.master_dashboard')
@section('title','Ubah Biaya Sanggar')
@section('content')
<form action="{{route('biaya.update')}}" method="POST">
	@csrf
	<h4>Biaya Per-sesi</h4>
	<hr>
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Biaya</label>
			<input count id="biaya" class="form-control" type="number" value="{{$biaya->harga}}" min="0" name="harga" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Administrasi<small>*Opsional</small></label>
			<input count id="administrasi" class="form-control" type="number" value="{{$biaya->administrasi}}" min='0' name="administrasi">
		</div>
		<div class="col-md-3 col-sm-12">
			<label>PPN (%)<small>*Opsional</small></label>
			<input count id="ppn" class="form-control" type="number" value="{{$biaya->ppn==null?0:$biaya->ppn}}" name="ppn">
		</div>
		

	</div>
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<h5>Total Biaya</h5>
					Rp<span id="biaya-total">{{$biaya->harga+$biaya->administrasi+(($biaya->harga+$biaya->administrasi)*($biaya->ppn/100))}}</span>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<h4>Biaya pendaftaran pertama</h4>
	<hr>

	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Biaya</label>
			<input count-pendaftaran id="biaya_p" class="form-control" type="number" value="{{$biaya_pendaftaran->harga}}" min="0" name="harga_p" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Administrasi<small>*Opsional</small></label>
			<input count-pendaftaran id="administrasi_p" class="form-control" type="number" value="{{$biaya_pendaftaran->administrasi}}" min='0' name="administrasi_p">
		</div>
		<div class="col-md-3 col-sm-12">
			<label>PPN (%)<small>*Opsional</small></label>
			<input count-pendaftaran id="ppn_p" class="form-control" type="number" value="{{$biaya_pendaftaran->ppn==null?0:$biaya_pendaftaran->ppn}}" name="ppn_p">
		</div>
		

	</div>
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<h5>Total Biaya</h5>
					Rp<span id="biaya-total-pendaftaran">{{$biaya_pendaftaran->harga+$biaya_pendaftaran->administrasi+(($biaya_pendaftaran->harga+$biaya_pendaftaran->administrasi)*($biaya_pendaftaran->ppn/100))}}</span>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Update Biaya</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')
<script>
	$('[count]').keyup(function(e){
		var biaya = parseInt($('#biaya').val());
		var administrasi = parseInt($('#administrasi').val());
		var ppn = parseInt($('#ppn').val());
		var total = biaya+administrasi+((biaya+administrasi)*(ppn/100))
		$('#biaya-total').html(total.toLocaleString('en-US'))
	})

	$('[count-pendaftaran]').keyup(function(e){
		var biaya = parseInt($('#biaya_p').val());
		var administrasi = parseInt($('#administrasi_p').val());
		var ppn = parseInt($('#ppn_p').val());
		var total = biaya+administrasi+((biaya+administrasi)*(ppn/100))
		$('#biaya-total-pendaftaran').html(total.toLocaleString('en-US'))
	})
</script>
@endsection
