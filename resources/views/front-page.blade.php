@extends('layouts.app')

@section('content')

<div class="intro">
    <img src="@asset('images/flash-info-fouffes-logo.png')" alt="">
    <h1>{{ get_bloginfo('name', 'display') }}</h1>
    <p class="lead">{{ get_bloginfo('description', 'display') }}</p>
</div>

<div class="cta ca-gratte">
  <div class="row">
    <div class="col-md-6">
      <img src="@asset('images/flash-info-fouffes-logo.png')" alt="">
    </div>
    <div class="col-md-6">
      <h2 class="display-4">Hello, world!</h2>
      <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
</div>
</div>

<div class="cta chat-perche">
  <div class="row  flex-row-reverse">
    <div class="col-md-6">
      <img src="@asset('images/flash-info-fouffes-logo.png')" alt="">
    </div>
    <div class="col-md-6">
      <h2 class="display-4">Hello, world!</h2>
      <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
</div>
</div>

<div class="cta soin-minou">
  <div class="row">
    <div class="col-md-6">
      <img src="@asset('images/flash-info-fouffes-logo.png')" alt="">
    </div>
    <div class="col-md-6">
      <h2 class="display-4">Hello, world!</h2>
      <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
</div>
</div>



  {{-- @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile --}}
@endsection
