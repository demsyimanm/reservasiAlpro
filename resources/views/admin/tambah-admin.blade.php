@extends ('admin.master.master')
@section ('content')
<meta charset="utf-8">
<h1 class="ui dividing header">
    <i class="users icon"></i>
    <div class="content">
      Tambah Administrator
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
              <label>Nama Lengkap</label>
              <input type="text" name="name" placeholder="Nama Lengkap">
            </div>
            <div class="twelve wide field">
              <label>NRP</label>
              <input type="text" name="nrp" placeholder="NRP">
            </div>
            <div ng-app="testApp" ng-strict-di>
              <div class="twelve wide field" ng-controller="mainController">
                <label>Tanggal Lahir</label>
                <input type="text" name="tanggal" ng-flat-datepicker datepicker-config="datepickerConfig" ng-model="date" ui-date ui-date-format>
              </div>
            </div>
            <br>
            <div class="twelve wide field">
              <label>Nomor HP</label>
              <input type="text" name="nohp" placeholder="Nomor HP">
            </div>
            <div class="twelve wide field">
              <label>Alamat</label>
              <input type="text" name="alamat" placeholder="Alamat">
            </div>
            <div class="twelve wide field">
              <label>Email</label>
              <input type="text" name="email" placeholder="Email">
            </div>
            <div class="twelve wide field">
              <label>Facebook</label>
              <input type="text" name="fb" placeholder="Facebook">
            </div>
            <div class="twelve wide field">
              <label>ID Line</label>
              <input type="text" name="line" placeholder="Line">
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
<script type="text/javascript">
  $('select.dropdown')
  .dropdown(); 
</script>

<script src="{{URL::to('assets/js/moment.min.js')}}"></script>
<script src="{{URL::to('assets/js/angular.min.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/dist/ng-flat-datepicker.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/demo/js/app.js')}}"></script>

@endsection