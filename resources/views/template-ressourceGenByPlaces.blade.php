{{--
  Template Name: Ressources Par Localités
--}}

@extends('layouts.pg-interne')

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

        $localites = get_terms( array(
          'taxonomy' => 'localites',
          'hide_empty' => true,
          ) );
    @endphp

<ul class="nav nav-tabs" id="myTab" role="tablist"> 
    @foreach ($localites as  $key => $localite)
    <li class="nav-item">
      <a class="nav-link @if($key==0) active  @endif" id="{{ $localite->slug }}-tab" data-toggle="tab" href="#{{ $localite->slug }}" role="tab" aria-controls="{{ $localite->slug }}" aria-selected="true">{{ $localite->name }}</a>
    </li>
    @endforeach
  </ul>

  <div class="tab-content" id="myTabContent">
    @foreach ($localites as $key => $localite)
    
    <div class="tab-pane fade @if($key==0) show active @endif container" id="{{ $localite->slug }}" role="tabpanel" aria-labelledby="{{ $localite->slug }}-tab">
      @foreach ($themes as $theme)
      <h3>ICI LE TITRE DU THEME {{ $theme->post_title }}</h3>
      @php
        $ressources = Ressource::GetByThemeGenByLocalite($theme, $localite->slug);
        @endphp

            @if(!empty($ressources))
              <div class="row">   
                @foreach ($ressources->get_posts() as $ressource)
                  <div class="col-sm-12  col-md-6 py-4">
                    @if($ressource->post_title)<h3>{{ $ressource->post_title }}  </h3>@endif 
                    @if($ressource->post_content)<p>{!! $ressource->post_content !!}  </p>@endif   
                    @if($ressource->adresse)<p>{{ $ressource->adresse }}  </p> @endif  
                    @if($ressource->telephone)<p><a href="tel:{{ $ressource->telephone }}">{{ $ressource->telephone }}  <a/></p> @endif  
                    @if($ressource->site_web)<p><a href="{{ $ressource->site_web }}">{{ $ressource->site_web }}  </a></p>  @endif 
                  </div>
                @endforeach
              </div>
            @endif

          </div>
          
        @endforeach
      @endforeach
      </div>
    </div>

  </section>

@endsection
    