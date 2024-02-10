@extends('layouts.master_dashboard')
@section('title',$pengumuman->title)
@section('content')


	<div class="row">
		<div class="col-md-12 col-sm-12">
			
			{!!$pengumuman->deskripsi!!}
		</div>
	</div>

@endsection
@section('javascript')

@endsection
