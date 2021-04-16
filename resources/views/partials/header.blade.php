
  <input type="checkbox" id="navcheck" role="button" title="menu">
  <label for="navcheck" aria-hidden="true" title="menu" >
    <span class="burger">
      <span class="bar">
        <span class="visuallyhidden">Menu</span>
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
  <div>

    <form class="form-inline search-form">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> 
  </div>
</nav>
