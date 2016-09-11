@extends ('user.master.master')
@section ('content')
<title>Algorithm and Programming</title>
<div class="ui container text" style="margin-bottom:10%; padding-bottom:3%">
  <h1 class="ui dividing header">
  	<i class="student icon"></i>
  	<div class="content">
    	Mata Kuliah
  	</div>
  </h1>
  <br>
  <div class="ui blue segment">
  	<table class="ui celled table table-hover" id="matkul">
	  <thead>
	    <tr>
		    <th width="10%">No.</th>
		    <th width="70%">Mata kuliah</th>
		</tr>
	  </thead>
	  <tbody>
	  	<?php $i = 0?>
	  	@foreach ($matkuls as $matkul)
		    <tr>
		      <td>{{++$i}}</td>
		      <td>{{$matkul->name}}</td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
  </div>
</div>
<script> 
  $(function () {
    $("#matkul").DataTable();
        });
</script>
@endsection