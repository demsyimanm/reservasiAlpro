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

<div class="ui inverted menu">
  <div class="header  item">Brand</div>
  <a class="item">Link</a>
  <div class="ui dropdown item">
    Dropdown
    <i class="dropdown icon"></i>
    <div class="menu">
      <div class="item">Action</div>
      <div class="item">Another Action</div>
      <div class="item">Something else here</div>
      <div class="divider"></div>
      <div class="item">Separated Link</div>
      <div class="divider"></div>
      <div class="item">One more separated link</div>
    </div>
  </div>
  <div class="right menu">
    <div class="item">
      <div class="ui transparent inverted icon input">
        <i class="search icon"></i>
        <input type="text" placeholder="Search">
      </div>
    </div>
    <a class="item">Link</a>
  </div>
</div>