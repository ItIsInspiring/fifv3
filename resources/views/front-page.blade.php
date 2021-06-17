@extends('layouts.app')

@section('content')
<div class="wrapper-main-content">

  <div class="intro">
      <img src="@asset('images/flash-info-fouffes-logo.png')" alt="">
      <h1 class="titre">{{ get_bloginfo('name', 'display') }}</h1>
      <h2 class="sstitre">{{ get_bloginfo('description', 'display') }}</h2>
  </div>
    
  <div class="cta ca-gratte photocop photocop-rouge" >
    <div class="row bloc-content align-items-center">
      <div class="col-md-6">
        <img src="@asset('images/gratte-homepage.png')" alt="">
      </div>
      <div class="col-md-6">
        @php $cta = FrontPage::getCTA(17); @endphp
        <h2>{{ $cta->title }}</h2>
        {{-- <p>{{ $cta->excerpt }}</p> --}}
        <div class="btn-fif"><a href="{{ $cta->url }}" role="button">En savoir plus</a></div>
      </div>
  </div>
  </div>

  <div class="cta chat-perche photocop photocop-inter">
    <div class="row bloc-content flex-row-reverse align-items-center">
      <div class="col-md-6">
        <img src="@asset('images/perche-homepage.png')" alt="">
      </div>
      <div class="col-md-6">
        @php $cta = FrontPage::getCTA(21); @endphp
        <h2>{{ $cta->title }}</h2>
        {{-- <p>{{ $cta->excerpt }}</p> --}}
        <div class="btn-fif"><a href="{{ $cta->url }}" role="button">En savoir plus</a></div>
      </div>
  </div>
  </div>

  <div class="cta soin-minou photocop photocop-violet">
    <div class="row bloc-content align-items-center">
      <div class="col-md-6">
        <img src="@asset('images/soin-homepage.png')" alt="">
      </div>
      <div class="col-md-6">
        @php $cta = FrontPage::getCTA(27); @endphp
        <h2>{{ $cta->title }}</h2>
        {{-- <p>{{ $cta->excerpt }}</p> --}}
        <div class="btn-fif"><a href="{{ $cta->url }}" role="button">En savoir plus</a></div>
      </div>
  </div>
  </div>
    {{-- @while(have_posts()) @php the_post() @endphp
      @include('partials.page-header')
      @include('partials.content-page')
    @endwhile --}}
</div>    
@endsection
