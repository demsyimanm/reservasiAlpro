@extends ('admin.master.master')
@section ('content')
<meta charset="utf-8">
<h1 class="ui dividing header">
    <i class="users icon"></i>
    <div class="content">
      Tambah Mata Kuliah
    </div>
  </h1>
<br>
<div class="ui grid stackable" style="margin-bottom:10%">
  <div  class="eleven wide column">
    <div class="ui blue segment" style="padding-bottom:5%">
      <form class="ui form" action="" method="post">
        <div visible>
          <div id="form1" >
            <div class="twelve wide field">
              <label>Nama Mata Kuliah</label>
              <input type="text" name="name" placeholder="Nama Mata Kuliah">
            </div>
            <div style="float:right">
              <button class="ui icon green button" type="submit">
                Simpan
                <i class="save icon"></i>
              </button>
            </div>
          </div>
        </div>
        <br>
        {{csrf_field()}}
      </form>
    </div>
  </div>
</div>
@endsection