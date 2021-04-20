{{--
  Template Name: Page avec Mosaique
--}}

@extends('layouts.app')

@section('content')
<div class="wrapper-main-content">

  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

</div>
@php
$page_slug = get_post_field( 'post_name' );
if($page_slug == 'ist'){
  $cpt_type = 'ist';   
} elseif($page_slug == 'produits-psychoactifs') {
  $cpt_type =  'produit_psychoactif';   
}
@endphp
{!! App::mozaic($cpt_type) !!}
@endsection
    