@extends('layouts.master_dashboard')
@section('title','Ubah data Grup')
@section('content')
<form action="{{route('grup.update')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$data->id}}">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Nama Grup</label>
			<input class="form-control" type="text" value="{{$data->nama}}" name="nama" required>
		</div>
		<div class="col-12">
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Deskripsi / Keterangan</label>
			<textarea class="form-control"  name="deskripsi" required>{{$data->deskripsi}}</textarea>
		</div>
		<div class="col-12">
		</div>
		<div class="col-md-6 col-sm-12">
			<input type="checkbox" id="bawaan" name="grup_bawaan" value="1" @if($data->grup_bawaan) checked  @endif>
			<label for="bawaan">Grup Bawaan Ketika Pendaftaran</label>
		</div>
		


	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Update data Grup</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
