@extends('layouts.master_dashboard')
@section('title','Tambahkan Pengumuman')
@section('content')
<form action="{{route('pengumuman.save')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Judul</label>
			<input type="text" name="title" class="form-control" required>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<label>Deskripsi Pengumuman</label>
			<textarea  name="deskripsi" class="form-control ck"></textarea>
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
