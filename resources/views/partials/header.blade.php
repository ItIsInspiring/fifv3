

  <div class="wrapper-main-menu">


  <input type="checkbox" id="navcheck" role="button" title="menu">
  <label for="navcheck" aria-hidden="true" title="menu" >
    <span class="burger">
      <span class="bar">
        <span class="matmat">Menu</span>
      </span>
    </span>
  </label>

<nav id="menu">
    <a class="brand" href="{{ home_url('/') }}">
      <img src="@asset('images/flash-info-fouffes-logo.png')" alt="">
      <span>{{ get_bloginfo('name', 'display') }}</span>
    </a>

    @if (has_nav_menu('primary_navigation'))
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav  flex-column' ]) !!}
    @endif
 
    <?php get_search_form( ); ?>

</nav>
</div>
@if(!is_front_page() && !is_home())
<header class="page-img">
  {!! App::img() !!}
</header>
@endif
@include('partials.secondary-menu')
