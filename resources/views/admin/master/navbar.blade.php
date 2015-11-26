<style>
  body {
    padding: 1em;
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
    <a class="item">Home</a>
    <a class="item">Reservasi</a>
    <a class="item">Mata Kuliah</a>
    <a class="item">Admin</a>
    <a class="item">Kalendar</a>
    <div class="right menu">
      <div class="item">
        <div class="ui transparent inverted icon input">
          <i class="search icon"></i>
          <input type="text" placeholder="Search">
        </div>
      </div>
      <a class="item">Logout</a>
    </div>
  </div>
</div>