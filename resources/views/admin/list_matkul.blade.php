@extends ('admin.master.master')
@section ('content')
<title>Algorithm and Programming</title>
<div class="ui text container" style="margin-bottom:10%">
  <h1 class="ui dividing header">
  	<i class="student icon"></i>
  	<div class="content">
    	Mata Kuliah
  	</div>
  </h1>
  <br>
  <a class="ui icon teal button" href="{{url('admin/tambah-matkul')}}" style="">
	<i class="trash icon"></i>
	Tambah Mata Kuliah
  </a>
  <br>
  <br>
  <div class="ui blue segment">
  	<table class="ui celled table table-hover" id="matkul">
	  <thead>
	    <tr>
		    <th width="5%">No.</th>
		    <th width="65%">Mata kuliah</th>
		    <th width="30%">Action</th>
		</tr>
	  </thead>
	  <tbody>
	  	<?php $i = 0?>
	  	@foreach ($matkuls as $matkul)
		    <tr>
		      <td>{{++$i}}</td>
		      <td>{{$matkul->name}}</td>
		      <td>
		      	<center>
			      	<a class="ui icon blue button" href="{{url('admin/update-matkul/'.$matkul->id)}}">
				        <i class="pencil icon"></i>
			        	Edit
			      	</a>
			      	<button class="ui icon test red button del" onclick="dele('{{url('admin/delete-matkul/'.$matkul->id)}}')">
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