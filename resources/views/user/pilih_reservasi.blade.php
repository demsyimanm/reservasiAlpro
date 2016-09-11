@extends ('user.master.master')
@section ('content')
<meta charset="utf-8">
<div class="ui ">
  <h1 class="ui center aligned icon dividing header">
    Reservasi Untuk :
  </h1>
  <div class="ui container text" style="margin-top:5%">
    <div class="kuliah">
      <a href="{{url('user/pesan')}}"><img src="{{URL::to('assets/image/kuliah_jadi2.png')}}" class="ui image" style="width:45%;float:left"></a>
    </div>
    <div class="kuliah">
      <a href="{{url('user/pesan_lain')}}"><img src="{{URL::to('assets/image/other_jadi2.png')}}" class="ui image" style="width:45%;float:right"></a>
    </div>
  </div>
</div>

<script type="text/javascript">
  function jiggle_(){
    $(".kuliah").transition('jiggle');
  };
</script>
@endsection