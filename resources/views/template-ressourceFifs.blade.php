{{--
  Template Name: Ressources pour ISTs, prods ou gynéco
--}}

@extends('layouts.app')

@section('content')
<div class="wrapper-main-content">

  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
</div>  

  <section>
    <div class="container">

      {{-- TABS NAVIGATION --}}
      @php
        $localites = get_terms( array(
          'taxonomy' => 'localites',
        ) );
      @endphp

        <ul class="nav nav-tabs" id="myTab" role="tablist"> 
          @foreach ( $localites as  $key => $localite )
          <li class="nav-item">
            <a class="nav-link @if($key==0) active  @endif" id="{{  $localite->slug }}-tab" data-toggle="tab" href="#{{  $localite->slug }}" role="tab" aria-controls="{{  $localite->slug }}" aria-selected="true">
              {{  $localite->name }}
            </a>
          </li>
          @endforeach
        </ul>

      {{-- TABPANELS --}}
      <div class="tab-content mb-3" id="myTabContent">
        @foreach ($localites as  $key => $tab )
          <div class="tab-pane fade @if($key==0) show active @endif container p-0" id="{{ $tab->slug }}" role="tabpanel" aria-labelledby="{{ $tab->slug }}-tab">
            @php 
              $results = Ressource::GetByLocalitesClassedByTypes($tab->slug);              
            @endphp

                @if($results)
                <div id="accordion-{{$tab->slug}}">
                  @foreach ($results as $type_id => $type)
                
                    <div class="card">
                      <div class="card-header" id="heading-{{$tab->slug}}-{{$type['type_slug']}}">
                        <p class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#{{$tab->slug}}-{{$type['type_slug']}}" aria-expanded="true" aria-controls="{{$type['type_slug']}}">
                            {{ $type['type_name'] }}
                          </button>
                        </p>
                      </div>
                  
                      <div id="{{$tab->slug}}-{{$type['type_slug']}}" class="collapse @if($loop->first) show @endif" aria-labelledby="heading-{{$tab->slug}}-{{$type['type_slug']}}" data-parent="#accordion-{{$tab->slug}}">
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
                <p>Si tu as des propositions ou si tu veux nous aider à enrichir ce contenu, n'hésite pas à nous <a href="mailto:fif@gmail.com?subject=contribuer+pour+les+ressources+de+{{ $tab->slug }}">envoyer un mail.</a></p>
              @endif
         

             

          </div>
        @endforeach
      </div>

      
    </div>
  </section>
@endsection