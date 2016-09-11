@extends ('admin.master.master')
@section ('content')
<meta charset="utf-8">
<title>Algorithm and Programming</title>
<h1 class="ui center aligned icon dividing header">
    <i class="student icon"></i>
    <div class="content">
      Detail Reservasi untuk Keperluan Lain
    </div>
</h1>
<br>
<div class="ui grid stackable" style="margin-bottom:10%">
  <div  class="nine wide column">
    <div class="ui blue segment" style="padding-bottom:5%">
      <h2 class="ui dividing header">
        <i class="calendar icon"></i>
        <div class="content">
          Reservasi
          <div class="sub header">Detail permohonan penyewaan Lab Alpro</div>
        </div>
      </h2>
      <br>
      <div class="ui form">
        <div visible>
          <div id="form1" >
            <div class="sixteen wide field">
              <label>NRP</label>
              <input type="text" name="nrp" placeholder="Nama Lengkap" value="{{$reservation->NRP_pemesan}}" readonly="">
            </div>
            <div class="sixteen wide field">
              <label>Nama Pemesan</label>
              <input type="text" name="name" placeholder="NRP" value="{{$reservation->nama_pemesan}}" readonly="">
            </div>
            <div class="sixteen wide field">
              <label>Nomor HP</label>
              <input type="text" name="nohp" placeholder="Nomor HP" value="{{$reservation->no_hp_pemesan}}" readonly="">
            </div>
            <div class="sixteen wide field">
              <label>Keperluan</label>
              <textarea type="text" name="materi" placeholder="Materi" style="resize:vertical;height:50%" readonly=""><?php echo ($reservation->penyewaan_lain)?></textarea>
            </div>
            <div class="sixteen wide field">
              <label>Jumlah Orang</label>
              <input type="text" name="jumlah" placeholder="Jumlah Orang" value="{{$reservation->jumlah}}" readonly="">
            </div>
            <div ng-app="testApp" ng-strict-di>
              <div class="sixteen wide field" ng-controller="mainController">
                <label>Tanggal</label>
                <input type="text" name="tanggal" ng-model="date" readonly="">
              </div>
            </div>
            <br>
            <div class="sixteen wide field bootstrap-timepicker timepicker">
              <label>Jam Mulai</label>
              <input type="text" readonly name="jam_mulai" value="{{$reservation->jam_mulai}}" readonly="">
            </div>
            <div class="sixteen wide field bootstrap-timepicker timepicker">
              <label>Jam Akhir</label>
              <input type="text" readonly name="jam_akhir" value="{{$reservation->jam_akhir}}" readonly="">
            </div>
          </div>
        </div>
        <br>
      </div>
    </div>
  </div>
  <div  class="seven wide column">
    <div class="ui red segment" style="padding-bottom:10%">
      <h2 class="ui dividing header">
        <i class="users icon"></i>
        <div class="content">
          Persetujuan
          <div class="sub header">Isikan detail persetujuan dari permohonan di samping</div>
        </div>
      </h2>
      <br>
      <form class="ui form" action="" method="post">
        <div class="sixteen wide field">
          <label>Admin yang Bertanggung Jawab</label>
          <select name="admin" class="ui search dropdown">
          @if ($reservation->admin_id != "" || $reservation->admin_id != 0)
            <option value="{{$reservation->admin_id}}">{{$reservation->admin->name}}</option>
            <option disabled="disabled">--------------------------------------------------------------------------------------------</option>
          @else
            <option value="0">--</option>
          @endif
            @foreach ($admins as $admin)
              <option value="{{$admin->id}}">{{$admin->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="sixteen wide field">
          <label>Keterangan / Pesan</label>
          <textarea type="text" name="keterangan" placeholder="Keterangan" style="resize:vertical;height:50%" >{{$reservation->keterangan}}</textarea>
        </div>
        {{csrf_field()}}
        <div style="float:left">
          <a class="ui icon red button" href="{{url('admin/tolak-penyewaan/'.$reservation->id)}}">
            <i class="remove icon"></i>
            Tolak
          </a>
        </div>
        <div style="float:right">
          <button class="ui icon green button" type="submit">
            Terima
            <i class="save icon"></i>
          </button>
        </div>
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
<script type="text/javascript">
  (function() {
    /**
     * Test code for ng-datepicker demo
     */
    angular
        .module('testApp', ['ngFlatDatepicker'])
        .controller('mainController', ['$scope', mainController]);

    function mainController ($scope) {

        $scope.datepickerConfig = {
            dateFormat: 'DD/MM/YYYY',

        };
        var today = new Date('<?php echo $reservation->tanggal?>');
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

        today = dd+'/'+mm+'/'+yyyy;
        $scope.date= today;
        
    }   

})();
</script>

@endsection