@extends ('admin.master.master')
@section ('content')
<title>Algorithm and Programming</title>

<div class="ui text" style="margin-bottom:10%">
	<div style="padding:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="users icon"></i>
	  	<div class="content">
	    	Administrator
	  	</div>
	  </h1>
	</div>
  <div style="padding:3%;padding-top:0px">
	  <a class="ui icon teal button" href="{{url('admin/tambah-admin')}}">
		<i class="trash icon"></i>
		Tambah Admin
	  </a>
  </div>
  <div style="padding:3%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
			    <th width="5%">No.</th>
			    <th width="18%">Nama</th>
			    <th width="10%">NRP</th>
			    <th width="12%">Tanggal Lahir</th>
			    <th width="10%">No HP</th>
			    <th width="17%">Alamat</th>
			    <th width="11%">Email</th>
			    <th width="17%">Action</th>
			</tr></thead>
		  <tbody>
		  	<?php $i = 0?>
		  	@foreach ($admins as $admin)
			    <tr>
			      <td>{{++$i}}</td>
			      <td>{{$admin->name}}</td>
			      <td>{{$admin->nrp}}</td>
			      <td>{{date_format(date_create($admin->tanggal_lahir),'d/m/Y')}}</td>
			      <td>{{$admin->no_hp}}</td>
			      <td>{{$admin->alamat}}</td>
			      <td>{{$admin->email}}</td>
			      <td class="center" style="">
			      	<center>
				      	<a class="ui icon blue button" href="{{url('admin/update-admin/'.$admin->id)}}">
				        	<i class="pencil icon"></i>
				        	Edit
				      	</a>

				      	<button class="ui icon test red button del" onclick="dele('{{url('admin/delete-admin/'.$admin->id)}}')">
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
  	Hapus Data Admin
  </div>
  <div class="content">
  	<center><p>Apakah Anda yakin ingin menghapus data Admin ini?</p></center>
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
    $("#matkul").DataTable();
        });
</script>
@endsection