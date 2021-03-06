@if (!$posts->have_posts())
<div class="alert alert-warning">
    {{ __('Sorry, no results were found.', 'sage') }}
</div>
{!! get_search_form(true) !!}
@else
<div class="container py-4">
    <div class="row">
        @while ($posts->have_posts()) @php $posts->the_post() @endphp
        @include('partials.content-post')
        @endwhile
    </div>
</div>
@endif

@include('partials.blog.entry-author-info')