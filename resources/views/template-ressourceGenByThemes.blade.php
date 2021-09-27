{{--
  Template Name: Ressources par Thèmes généraux
--}}

@extends('layouts.app')

@section('content')

<div class="wrapper-main-content">

  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

  

</div>

<section id="ressources" class="container">
    
  @php
      $themes = get_terms( array(
        'taxonomy' => 'themesgeneraux',
        'hide_empty' => true,
        ) );
  @endphp

<ul class="nav nav-tabs" id="myTab" role="tablist"> 
  @foreach ($themes as  $key => $theme)
  <li class="nav-item">
    <a class="nav-link @if($key==0) active  @endif" id="{{ $theme->slug }}-tab" data-toggle="tab" href="#{{ $theme->slug }}" role="tab" aria-controls="{{ $theme->slug }}" aria-selected="true">{{ $theme->name }}</a>
  </li>
  @endforeach
</ul>

{{-- TABPANELS --}}
<div class="tab-content mb-3" id="myTabContent">
  @foreach ($themes as  $key => $theme )
    <div class="tab-pane fade @if($key==0) show active @endif container p-0" id="{{ $theme->slug }}" role="tabpanel" aria-labelledby="{{ $theme->slug }}-tab">
      @php 
        $results = Ressource::getByThemeGenClassedByTypes($theme->slug);              
      @endphp


      @if($results)
        <div id="accordion-{{$theme->slug}}">
          @foreach ($results as $type_id => $type)
         
            <div class="card">
              <div class="card-header" id="heading-{{$theme->slug}}-{{$type['type_slug']}}">
                <p class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#{{$theme->slug}}-{{$type['type_slug']}}" aria-expanded="true" aria-controls="{{$type['type_slug']}}">
                    {{ $type['type_name'] }}
                  </button>
                </p>
              </div>
          
              <div id="{{$theme->slug}}-{{$type['type_slug']}}" class="collapse" aria-labelledby="heading-{{$theme->slug}}-{{$type['type_slug']}}" data-parent="#accordion-{{$theme->slug}}">
                <div class="card-body">
                  <div class="row card-body-ressource">
                    @each('partials.content-ressource', $type['ressources'] , 'ressource')                  
                  </div>
                </div>
              </div>
            </div>
           
            @endforeach
        </div>
      @else 
        <h3>{{ $tab->name }} ne possède pas encore de ressources.</h3>
        <p>Si tu as des propositions ou si tu veux nous aider à enrichir ce contenu, n'hésite pas à nous <a href="mailto:fif@gmail.com?subject=contribuer+pour+les+ressources+de+{{ $theme->slug }}">envoyer un mail.</a></p>
      @endif
      
    </div>
  @endforeach
</div>

</section>
@endsection
    