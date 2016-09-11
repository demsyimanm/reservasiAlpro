@extends ('user.master.master')
@section ('content')
<meta charset="utf-8">
<h2 class="ui left aligned icon dividing header">
  Reservasi Keperluan Lain
</h2>
<br>
<div class="ui grid stackable" style="margin-bottom:10%">
  <div  class="nine wide column">
    <div class="ui teal segment" style="">
      <div class="ui three top attached steps">
        <a class="active step" id="pemesan">
          <i class="user icon"></i>
          <div class="content">
            <div class="title">Pemesan</div>
            <div class="description">Masukkan data Anda</div>
          </div>
        </a>
        <a class="disabled step" id="matkul">
          <i class="calendar icon"></i>
          <div class="content">
            <div class="title">Keperluan</div>
            <div class="description">Masukkan keperluan Anda</div>
          </div>
        </a>
        <a class="disabled step" id="waktu">
          <i class="clock icon"></i>
          <div class="content">
            <div class="title">Waktu</div>
            <div class="description">Pilih waktu tutor (diluar yang sudah ada di kalendar reservasi)</div>
          </div>
        </a>
      </div>
      <div class="ui attached segment">
        <form class="ui form" id="form_reservasi" action="{{url('user/pesan_lain')}}" method="post">
          <div visible>
            <div id="form1" >
              <div class="sixteen wide field">
                <label>NRP</label>
                <input type="text" name="nrp" placeholder="NRP">
              </div>
              <div class="sixteen wide field">
                <label>Nama Lengkap</label>
                <input type="text" name="name" placeholder="Nama Lengkap">
              </div>
              <div class="sixteen wide field">
                <label>Nomor HP</label>
                <input type="text" name="nohp" placeholder="Nomor HP">
              </div>
              <br>
              <div style="float:right">
                <a class="ui icon blue button" id="next1" onclick="showForm2()">
                  Selanjutnya
                  <i class="arrow right icon"></i>
                </a>
              </div>
            </div>
          </div>
          <div hidden>
            <div id="form2" >
              <br>
              <div class="sixteen wide field">
                <label>Keperluan</label>
                <textarea type="text" name="keperluan" placeholder="Keperluan" style="resize:vertical;height:50%"></textarea>
              </div>
              <div class="sixteen wide field">
                <label>Jumlah orang</label>
                <input type="text" name="jumlah" placeholder="Jumlah Orang">
              </div>
              <br>
              <div style="float:left">
                <a class="ui icon red button" id="back2" onclick="showForm1()">
                  <i class="arrow left icon"></i>
                  Kembali
                </a>
              </div>
              <div style="float:right">
                <a class="ui icon blue button" onclick="showForm3()">
                  Selanjutnya
                  <i class="arrow right icon"></i>
                </a>
              </div>  
            </div>
          </div>
          <div hidden>
            <div id="form3" >
              <div ng-app="testApp" ng-strict-di>
                <div class="sixteen wide field" ng-controller="mainController">
                  <label>Tanggal</label>
                  <input type="text" name="tanggal" ng-flat-datepicker datepicker-config="datepickerConfig" ng-model="date" ui-date ui-date-format>
                </div>
              </div>
              <br>
              <div class="sixteen wide field bootstrap-timepicker timepicker">
                <label>Jam Mulai</label>
                <input type="text" data-field="time" readonly name="jam_mulai">
                <div id="dtBox1"></div>
              </div>
              <div class="sixteen wide field bootstrap-timepicker timepicker">
                <label>Jam Akhir</label>
                <input type="text" data-field="time" readonly name="jam_akhir">
                <div id="dtBox2"></div>
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <br>
              <div style="float:left">
                <a class="ui icon red button" id="back3" onclick="showForm2()">
                  <i class="arrow left icon"></i>
                   Kembali
                </a>
              </div>
              <div style="float:right">
                <a class="ui icon green button" onclick="success()" >
                  Pesan
                  <i class="check icon"></i>
                </a>
              </div>
            </div>
          </div>
          <br>
          <br>
        </form>
      </div>
    </div>
  </div>
  <div class="seven wide column">
    <div class="ui blue segment" style=" font-size:12px">
    <h2 class="ui left aligned icon dividing header">
      Daftar Reservasi
    </h2>
      <table class="ui table">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Mulai</th>
            <th>Akhir</th>
            <th>Keperluan</th>
            <th>Penyewa</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reservations as $reservation)
            <tr>
              <td>{{date_format(date_create($reservation->tanggal),'d M Y')}}</td>
              <td>{{date_format(date_create($reservation->jam_mulai),'H:i')}}</td>
              <td>{{date_format(date_create($reservation->jam_akhir),'H:i')}}</td>
              @if ($reservation->matkul_id != "" || $reservation->matkul_id != "0" )
                <td>{{$reservation->matkul->name}}</td>
              @elseif ($reservation->penyewaan_lain != "" || $reservation->penyewaan_lain != "0" || $reservation->matkul_id == "0" || $reservation->matkul_id == "" )
                <td>{{$reservation->penyewaan_lain}}</td>
              @endif
              <td>{{$reservation->nama_pemesan}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="ui small test modal" id="modaldiv" style="margin-top:-15%">
  <div class="header">
    Reservasi Berhasil
  </div>
  <div class="image content">
    <div class="ui medium image">
      <img src="{{URL::to('assets/image/alpro2.png')}}">
    </div>
    <div class="description">
      <div class="ui header">Pemesanan Lab Alpro telah berhasil</div>
      <p>Informasi mengenai penerimaan pemesanan akan Admin kabari melalui SMS kepada nomor HP yang Anda isikan dan juga bisa Anda lihat melalui Kalendar Reservasi.</p>
      <p>Informasi akan kami kirimkan paling lambat H-1 tanggal pemesanan</p>
      <p>Terimakasih atas kepercayaannya kepada Laboratorium Algoritma dan Pemrograman</p>
      <br>
      <br>
      <p style="float:right">Best regards, Alpro</p>
    </div>
  </div>
  <div class="actions">
    <div style="float:right">
      <button class="ui icon green button" id="submit">
        Lanjutkan
        <i class="arrow right icon"></i>
      </button>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('select.dropdown')
  .dropdown(); 
</script>
<script type="text/javascript">
  function showForm1() {
   document.getElementById("pemesan").className = "active step";
   document.getElementById("matkul").className = "disabled step";
   document.getElementById("waktu").className = "disabled step";
   $("#form1").parent().show();
   $("#form2").parent().hide();
   $("#form3").parent().hide();
  };
  function showForm2() {
   document.getElementById("pemesan").className = "disabled step";
   document.getElementById("matkul").className = "active step";
   document.getElementById("waktu").className = "disabled step";
   $("#form1").parent().hide();
   $("#form2").parent().show();
   $("#form3").parent().hide();
  };
  function showForm3() {
  document.getElementById("pemesan").className = "disabled step";
   document.getElementById("matkul").className = "disabled step";
   document.getElementById("waktu").className = "active step";
   $("#form1").parent().hide();
   $("#form2").parent().hide();
   $("#form3").parent().show();
  };
</script>
<script type="text/javascript">
  $(document).ready(function()
  {
    $("#dtBox1").DateTimePicker({
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function()
  {
    $("#dtBox2").DateTimePicker({
    });
  });
</script>
<script type="text/javascript">
  function success(){
    $('#modaldiv')
    .modal('setting', 'closable', false)
    .modal('show');
  };
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).ready(function () {
    $("#submit").click(function(){
        var $form = $('#form_reservasi');
        var $inputs = $form.find("input, select, textarea");

        var serializedData = $form.serialize();
        $inputs.prop("disabled", true);
        request = $.ajax({
            url: "{{url('user/pesan_lain')}}",
            type: "post",
            data: serializedData
        });
        request.always(function () {
            $inputs.prop("disabled", false);
        });
        event.preventDefault();
        $('#modaldiv').modal('hide');
        window.location.href = "{{url('user/pilih')}}";
    });
  });
</script>
<script src="{{URL::to('assets/js/moment.min.js')}}"></script>
<script src="{{URL::to('assets/js/angular.min.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/dist/ng-flat-datepicker.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/demo/js/app.js')}}"></script>

@endsection