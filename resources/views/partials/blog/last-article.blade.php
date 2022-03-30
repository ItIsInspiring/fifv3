@php $lastArticle = Home::getLastArticle(); @endphp
@if($lastArticle)
@while ($lastArticle->have_posts()) @php $lastArticle->the_post() @endphp
<section class="last-article bg-light">
  <div class="container-fluid">
    <div class="row">

      {{-- affiche le dernier article du blog --}}
      <div class="post col-sm-12 col-md-12 col-lg-6">
        <div class="post-wrapper-img">
          
          @if (get_the_post_thumbnail_url())
            <img class="img-fluid" src="{{ get_the_post_thumbnail_url() }}" alt="{!! get_the_title() !!}">
          @else
            <img class="img-fluid" src="@asset('images/default.jpg')" alt="{!! get_the_title() !!}">
          @endif

        </div>
      </div>

      <div class="col-sm-12 col-md-12 col-lg-6 p-0">
        <div class="post-body p-4">
          <h2 class="post-title">{!! get_the_title() !!}</h2>
          @include('partials/entry-meta')
          <p>{!!  get_the_excerpt() !!}</p>
          <a class="btn-read" href="{{ get_permalink() }}">Lire la suite</a>
        </div>
      </div>

    </div>
  </div>
  
</section>        
@endwhile
@endif