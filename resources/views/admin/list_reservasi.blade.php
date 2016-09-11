@extends ('admin.master.master')
@section ('content')
<title>Algorithm and Programming</title>
<div class="ui text" style="margin-bottom:10%">
	<div style="padding:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="payment icon"></i>
	  	<div class="content">
	    	Reservasi
	  	</div>
	  </h1>
  	</div>
  <br>
  <div style="padding:3%;padding-top:0px;padding-bottom:7%">
  	<div class="ui blue segment">
	  	<table class="ui celled table table-hover" id="reservasi">
		  <thead>
		    <tr>
			    <th width="5%">No.</th>
			    <th width="10%">Tanggal</th>
			    <th width="10%">Mulai</th>
			    <th width="10%">Akhir</th>
			    <th width="10%">Pemesan</th>
			    <th width="15%">Matkul</th>
			    <th width="10%">Keperluan lain</th>
			    <th width="10%">Status</th>
			    <th width="20%">Aksi</th>
			</tr></thead>
		  <tbody>
		  	<?php $i=0 ?>
		  		@foreach($reservations as $reservation)
				    <tr>
				      <td>{{++$i}}</td>
				      <td>{{date_format(date_create($reservation->tanggal),'d/m/Y')}}</td>
				      <td>{{$reservation->jam_mulai}}</td>
				      <td>{{$reservation->jam_akhir}}</td>
				      <td>{{$reservation->nama_pemesan}}</td>
				      @if ($reservation->matkul_id != 0 || $reservation->matkul_id != "")
				      	<td>{{$reservation->matkul->name}}</td>
				      @else
				      	<td></td>
				      @endif
				      <td>{{$reservation->penyewaan_lain}}</td>
				      @if ($reservation->status == 0 || $reservation->status == "")
				      	<td><center><div class="ui orange horizontal label">On process</div></center></td>
				      @elseif ($reservation->status == 1)
				      	<td><center><div class="ui green horizontal label">Approved</div></center></td>
				      @elseif ($reservation->status == 2)
				      	<td><center><div class="ui red horizontal label">Denied</div></center></td>
				      @endif
				      <td>
				      	<center>
					      	<a class="ui icon blue button" href="{{url('admin/lihat-penyewaan/'.$reservation->id)}}">
					        	<i class="unhide icon"></i>
					        	Lihat
					      	</a>
					      	<button class="ui icon test red button del" onclick="dele('{{url('admin/delete-reservasi/'.$reservation->id)}}')">
					        	<i class="trash icon"></i>
					        	Hapus
					      	</button>
					    </center>
				      </td>
				    </tr>
				@endforeach
		  </tbody>
		</table>
	</div>
  </div>
</div>
<div id="modaldiv" class="ui small basic test modal" >
  <div class="ui icon header">
  	<i class="trash icon"></i>
  	Hapus data reservasi
  </div>
  <div class="content">
  	<center><p>Apakah Anda yakin ingin menghapus data reservasi ini?</p></center>
  </div>
  <div class="actions">
  	<div class="ui red basic cancel inverted button">
    	<i class="remove icon"></i>
    	No
  	</div>
  	<a class="ui green ok inverted button button_modal">
    	<i class="checkmark icon"></i>
    	Yes
  	</a>
   </div>
</div>
<script type="text/javascript">
	function dele(id){
        $('#modaldiv').modal('show');
        $('.button_modal').attr({href:id});
	};
</script>
<script> 
  $(function () {
    $("#reservasi").DataTable();
   });
</script>
@endsection