<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use \WP_Query;

class Home extends Controller
{
    public function testBlog()
    {
        return "ceci est le test du blog";
    }
    public function toShowArticlesCategories()
    {
        $cats = get_categories();
        return $cats;
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    /**
     * function to show a number of recent articles
     *
     * @param [int] $nbArticles
     * @param [int] $exclude
     * @return void
     */ 
    public static function getSomeArticles($nbArticles, $exclude) 
    {
        
        if($exclude == null){
            $args =  array(
            'post_type' => 'post',
            'orderby'        => 'rand',
            'posts_per_page' =>  $nbArticles
            );
        } else {
            $args =  array(
            'post_type' => 'post',
            'orderby'        => 'rand',
            'posts_per_page' =>  $nbArticles,
            'offset' =>  $exclude
            );
        }


        $articles = new Wp_Query($args);
        
        if ($articles !== null) {
            // get the total of projet
            // $totalNbarticles = wp_count_posts( 'post' )->publish;
            return $articles;
        } else {
            return "il n'y pas d'article dans le blog";
        }
        wp_reset_postdata(); 
    }

    /**
     * get last article
     *
     * @param [type] 
     * @return void
     */
    public static function getLastArticle() 
    {
        $args = array('posts_per_page'=>1);
    
        $article = new WP_Query( $args );
        if ($article !== null) {
            return $article;
        } else {
            return "Il y a un probleme avec l'affichage du dernier article";
        }

        wp_reset_postdata(); 

    }

}