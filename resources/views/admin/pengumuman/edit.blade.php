@extends('layouts.master_dashboard')
@section('title','Tambahkan Pengumuman')
@section('content')
<form action="{{route('pengumuman.update')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{ $pengumuman->id }}">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Judul</label>
			<input type="text" name="title" class="form-control" value="{{ $pengumuman->title }}">
	</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<label>Deskripsi Pengumuman</label>
			<textarea  name="deskripsi" class="form-control ck">{!! $pengumuman->deskripsi !!}</textarea>

		</div>
		<div class="col-12">
		</div>
		<div class="col-md-6 col-sm-12">
			<input type="checkbox" id="bawaan" name="text_berjalan" value="1" @if($pengumuman->text_berjalan) checked  @endif>
			<label for="bawaan">Tampilkan di text bejalan</label>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Simpan Pengumuman</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
     CKEDITOR.replace( 'deskripsi' );
});
</script>
@endsection
