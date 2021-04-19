@extends('layouts.app')

@section('content')

<div class="intro">
    <img src="@asset('images/flash-info-fouffes-logo.png')" alt="">
    <h1>{{ get_bloginfo('name', 'display') }}</h1>
    <p>{{ get_bloginfo('description', 'display') }}</p>
</div>
  
<div class="cta ca-gratte">
  <div class="row bloc-content">
    <div class="col-md-6">
      <img src="@asset('images/flash-info-fouffes-logo.png')" alt="">
    </div>
    <div class="col-md-6">
      <h2>Ça me gratte !</h2>
      <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <div class="btn-fif"><a href="#" role="button">Learn more</a></div>
    </div>
</div>
</div>

<div class="cta chat-perche">
  <div class="row bloc-content flex-row-reverse">
    <div class="col-md-6">
      <img src="@asset('images/flash-info-fouffes-logo.png')" alt="">
    </div>
    <div class="col-md-6">
      <h2>Chat perché !</h2>
      <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <div class="btn-fif"><a href="#" role="button">Learn more</a></div>
    </div>
</div>
</div>

<div class="cta soin-minou">
  <div class="row bloc-content">
    <div class="col-md-6">
      <img src="@asset('images/flash-info-fouffes-logo.png')" alt="">
    </div>
    <div class="col-md-6">
      <h2>Prends soin de ton minou !</h2>
      <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <div class="btn-fif"><a href="#" role="button">Learn more</a></div>
    </div>
</div>
</div>



  {{-- @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile --}}
@endsection
