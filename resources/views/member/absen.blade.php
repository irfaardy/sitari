

@extends('layouts.master_dashboard')

@section('title','Lakukan Absen Hari ini')

@section('content')


	<div class="row justify-content-center">

		<div class="col-md-6 col col-sm-12">

			<div class="card">

				<div class="card-body" align="center">
					<h4><b>Nama:</b><br>{{auth()->user()->name}}</h4>
					<h4><b>Tanggal:</b><br>{{date("d/m/Y")}}</h4>
						<hr>
					@if(!empty($presensi))
					<div class="alert alert-info">Anda sudah melakukan absen hari ini pada jam {{date("H:i",strtotime($presensi->created_at))}}</div>
					@else

					<form action="{{route('presensi.action')}}" method="post">
						@csrf
						<button class="btn btn-success btn-block">Klik disini untuk absensi</button>
					</form>
					@endif
				</div>

			</div>

		</div>

	</div>

@endsection

@section('javascript')



@endsection

