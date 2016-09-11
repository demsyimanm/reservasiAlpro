<style>
  body {
    padding-top: 6em;
  }
  .ui.menu {
    margin: 3em 0em;
  }
  .ui.menu:last-child {
    margin-bottom: 110px;
  }
  </style>

  <!--- Example Javascript -->
  <script>
  $(document)
    .ready(function() {
      $('.ui.menu .ui.dropdown').dropdown({
        on: 'hover'
      });
      $('.ui.menu a.item')
        .on('click', function() {
          $(this)
            .addClass('active')
            .siblings()
            .removeClass('active')
          ;
        })
      ;
    })
  ;
  </script>

<div class="ui fixed inverted menu">
 <div class="ui container">
    <div class="header item"><img class ="logo" src="{{URL::to('assets/image/alpro2.png')}}" style="50%"> ALPRO</div>
    <a class="item" href="{{url('admin')}}">Home</a>
    <a class="item" href="{{url('admin/reservasi')}}">Reservasi</a>
    <a class="item" href="{{url('admin/matkul')}}">Mata Kuliah</a>
    <a class="item" href="{{url('admin/admin')}}">Admin</a>
    <a class="item" href="{{url('admin/calendar')}}">Kalendar</a>
    <div class="right menu">
      <div class="item">
        <div class="ui transparent inverted icon input">
          <i class="search icon"></i>
          <input type="text" placeholder="Search">
        </div>
      </div>
      <a class="item" href="{{url('admin/logout')}}">Logout</a>
    </div>
  </div>
</div>