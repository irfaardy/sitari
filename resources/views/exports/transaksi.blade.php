<table border="1px">
	<tr>
		<td style="border: 1px #000 solid;" colspan="9" align="center">Laporan Transaksi {{$kategori}} {{$range}} (Status: {{$status}})</td>
	</tr>
	<tr>
		<td ><b>Invoice</b></td>
		<td ><b>Nama</b></td>
		<td ><b>Grup</b></td>
		<td ><b>No Hp</b></td>
		<td ><b>Jumlah Absensi</b></td>
		<td ><b>Biaya Admin</b></td>
		<td ><b>Biaya Sanggar</b></td>
		<td ><b>PPN</b></td>
		<td ><b>Total</b></td>
		<td ><b>Waktu Pembayaran</b></td>
	</tr>
	<?php $i=1; 
		$biaya_adm =0;
		$harga =0;
		$ppn =0;
		$total_harga =0;
		?>`
	@foreach($transaksi as $t)
	<?php 
		$biaya_adm += $t->biaya_administrasi;
		$harga += $t->harga;
		$ppn += $t->ppn;
		$total_harga += $t->total_harga;
	?>
	<tr>
		<td>{{$t->invoice_code}}</td>
		<td>{{$t->user->name}}</td>
		<td>{{$t->user->dtgrup->nama}}</td>
		<td>{{$t->user->no_hp}}</td>
		<td>{{$t->jumlah_presensi}}</td>
		<td>{{$t->biaya_administrasi}}</td>
		<td>{{$t->harga}}</td>
		<td>{{empty($t->ppn)?"-":$t->ppn}}</td>
		<td>{{$t->total_harga}}</td>
		<td>{{$t->dibayarkan_pada}}</td>
	</tr>
	@endforeach
	<tr>
		<td colspan="5" align="center"><b>Total</b></td>
		<td><b>{{$biaya_adm}}</b></td>
		<td><b>{{$harga}}</b></td>
		<td><b>{{empty($ppn) ? '-':$ppn}}</b></td>
		<td><b>{{$total_harga}}</b></td>
	</tr>
</table>