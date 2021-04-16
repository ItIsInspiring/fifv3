<footer class="content-info footer-fif">

  <div class="container">
    <div class="row">
      <p class="brand mx-auto">{{ get_bloginfo('name', 'display') }}</p>
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      {{ wp_nav_menu( array(
        'menu'=>'social-links', 
        'menu_class' => 'nav justify-content-center',
        'container_class' => 'w-100',
        ) ) }}
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      {{ wp_nav_menu( array(
        'menu'=>'footer-menu', 
        'menu_class' => 'nav justify-content-center',
        'container_class' => 'w-100',
        ) ) }}
    </div>
  </div>

</footer>
