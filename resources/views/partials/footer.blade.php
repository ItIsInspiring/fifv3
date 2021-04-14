<footer class="content-info footer-fif">

  <div class="container">
    <div class="row">
      <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      {{ wp_nav_menu( array('menu'=>'social-links') ) }}
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      {{ wp_nav_menu( array('menu'=>'footer-menu') ) }}
    </div>
  </div>

</footer>
