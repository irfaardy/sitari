<table border="1px">
	<tr>
		<td style="border: 1px #000 solid;" colspan="6" align="center"><b>Anggota Sanggar  (Grup: {{$group}})</b></td>
	</tr>
	<tr>
		<td ><b>Nama</b></td>
		<td ><b>Email</b></td>
		<td ><b>Grup</b></td>
		<td ><b>No Hp</b></td>
		<td ><b>Status Akun</b></td>
		<td ><b>Tanggal Bergabung</b></td>
	</tr>

	@foreach($data as $t)
	<tr>
		<td>{{$t->name}}</td>
		<td>{{$t->email}}</td>
		<td>{{$t->dtgrup->nama}}</td>
		<td>{{$t->no_hp}}</td>
		<td>
                @if($t->status)
                Non-aktif
                @else
                Aktif
                @endif</td>
		<td>{{date('Y-m-d',strtotime($t->created_at))}}</td>
		
	</tr>
	@endforeach
	
</table>