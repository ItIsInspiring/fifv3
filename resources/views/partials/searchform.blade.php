<form role="search" method="get" class="search-form container" action="{{ esc_url( home_url( '/' ) ) }}">
<div class="row">

  <div class="col-md-9">
    <label>
      <span class="screen-reader-text">{{ _x( 'Search for:', 'label' ) }}</span>
      <input type="search" class="search-field" placeholder="{!! esc_attr_x( 'Search &hellip;', 'placeholder' ) !!}" value="{{ get_search_query() }}" name="s" />
    </label>
  </div>

  <div class="col-md-3">
    <input type="submit" class="search-submit" value="{{ esc_attr_x( 'Search', 'submit button' ) }}" />
  </div>

</div>
</form>