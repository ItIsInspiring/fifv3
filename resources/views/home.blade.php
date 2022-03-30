  {{-- LA HOME DU BLOG pas la page d'accueil du site --}}

  @extends('layouts.blog')

@section('content')
  @include('partials.page-header')
  <nav>
    <ul class="nav blog-menu-cat">
      @foreach ($to_show_articles_categories as $cat)
      <li class="nav-item"><a  class="nav-link" href="/{{ $cat->slug }}">{{ $cat->name }}</a></li>
      @endforeach
    </ul>
  </nav>

  <section id="last-article">
    @include("partials.blog.last-article")
  </section>

  <section id="others-articles">
    <h2 class="mt-5 text-center">Autres articles</h2>
    @php $posts = Home::getSomeArticles(3, 1) @endphp
    @if (!$posts->have_posts())
    <div class="alert alert-warning">
        {{ __('Désolé ! aucun aure article n\'a été trouvé', 'sage') }}
    </div>
    {!! get_search_form(true) !!}
    @else
    <div class="container py-4">
        <div class="row">
            @while ($posts->have_posts()) @php $posts->the_post() @endphp

            <div class="col-md-4">
                <article @php post_class("blog-article card") @endphp>
                    <div class="card-img">
                        @if (get_the_post_thumbnail_url())
                        <img class="img-fluid" src="{{ get_the_post_thumbnail_url() }}" alt="{!! get_the_title() !!}">
                        @else
                        <img class="img-fluid" src="@asset('images/default.jpg')" alt="{!! get_the_title() !!}">
                        @endif
                      </div>
                      <div class="card-body">
                        <h3 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h3>
                        @include('partials/entry-meta')
                        <p>{!!  get_the_excerpt() !!}</p>
                        <a class="btn-read" href="{{ get_permalink() }}">Lire la suite</a>

                      </div>
                </article>
            </div>

            @endwhile
        </div>
    </div>
    @endif

    {!! get_the_posts_navigation() !!}

  </section>

@endsection
