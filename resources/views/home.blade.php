  {{-- LA HOME DU BLOG pas la page d'accueil du site --}}

  @extends('layouts.blog')

@section('content')
  @include('partials.page-header')
  <nav>
    <ul class="nav justify-content-center">
      @foreach ($to_show_articles_categories as $cat)
      <li class="nav-item"><a  class="nav-link" href="/{{ $cat->slug }}">{{ $cat->name }}</a></li>
      @endforeach
    </ul>
  </nav>

  @include("partials.blog.last-article")

  @php $posts = Home::getSomeArticles(2, 1) @endphp
  @if (!$posts->have_posts())
  <div class="alert alert-warning">
      {{ __('Désolé ! aucun aure article n\'a été trouvé', 'sage') }}
  </div>
  {!! get_search_form(true) !!}
  @else
  <div class="container py-4">
      <div class="row">
          @while ($posts->have_posts()) @php $posts->the_post() @endphp
          
          <div class="col">
            <article @php post_class() @endphp>
              <header>
                @if (get_the_post_thumbnail_url())
                  <img class="img-fluid" src="{{ get_the_post_thumbnail_url() }}" alt="{!! get_the_title() !!}">
                @else
                  <img class="img-fluid" src="@asset('images/default.jpg')" alt="{!! get_the_title() !!}">
                @endif
                <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
                @include('partials/entry-meta')
              </header>
              <div class="entry-summary">
                @php the_excerpt() @endphp
              </div>
            </article>
          </div>

          @endwhile
      </div>
  </div>
  @endif

  {!! get_the_posts_navigation() !!}


@endsection
