@extends('layouts.app')

@section('content')
  @if(get_post_type() =='ist' OR get_post_type() == 'produit_psychoactif')
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-single-'.get_post_type())
      @include('partials.bloc-liste-cpt') 

    @endwhile
  @else
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-single-'.get_post_type())
    @endwhile
    
  @endif
@endsection
