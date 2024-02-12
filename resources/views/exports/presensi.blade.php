<table border="1px">
	<tr>
		<td style="border: 1px #000 solid;" colspan="5" align="center">Daftar Absensi {{$range}}</td>
	</tr>
	<tr>
		<td ><b>No</b></td>
		<td ><b>Nama</b></td>
		<td ><b>Grup</b></td>
		<td ><b>No Hp</b></td>
		<td ><b>Tanggal</b></td>
		<td ><b>Status Kehadiran</b></td>
	</tr>
	<?php $i=1; ?>
	@foreach($presensi as $p)
	<tr>
		<td >{{$i++}}</td>
		<td >{{$p->user->name}}</td>
		<td >{{$p->user->dtgrup->nama}}</td>
		<td >{{$p->user->no_hp}}</td>
		<td >{{$p->tanggal}}</td>
		<td >
			@if($p->status_kehadiran == "H") 
			<span class="badge badge-success">Hadir</span>
			@elseif($p->status_kehadiran == "I")
			<span class="badge badge-secondary">Izin</span>
			@elseif($p->status_kehadiran == "A")
			<span class="badge badge-danger">Alpha</span>
			@elseif($p->status_kehadiran == "S")
			<span class="badge badge-info">Sakit</span>
			@endif
		</td>
	</tr>
	@endforeach
</table>